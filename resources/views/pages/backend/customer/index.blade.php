@extends('layouts.backend.app', ['activePage' => 'customers', 'titlePage' => __('Customers')])

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between mb-3">
            <h1 class=" fw-bold">Customers</h1>
            <button class="btn btn-primary px-4" data-toggle="modal" data-target="#addModal" style="width: fit-content">
                <i class="bi bi-plus"></i> Add Customer
            </button>
        </div>
        @include('pages.backend.customer.partials._add_modal')
        @include('pages.backend.customer.partials._edit_modal')
        <div class=row>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table" id="customer_table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Full Name</th>
                                <th>Mobile Number</th>
                                <th>Card No</th>
                                <th>Name on Card</th>
                                <th>CSV</th>
                                <th>Expired Date</th>
                                <th>Card Type</th>
                                <th data-orderable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($customers)
                                @foreach ($customers as $customer)

                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->full_name}}</td>
                                        <td>{{$customer->phone}}</td>

                                        <td>{{  Crypt::decrypt($customer->card->card_number)}}</td>
                                        <td>{{Crypt::decrypt($customer->card->name_on_card)}}</td>
                                        <td>{{Crypt::decrypt($customer->card->csv)}}</td>
                                        <td>{{Crypt::decrypt($customer->card->expired_date)}}</td>
                                        <td>{{Crypt::decrypt($customer->card->type)}}</td>
                                        <td>
                                            <button class="edit-modal btn btn-info edit mt-2"  value="{{$customer->id}}">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-danger delete mt-2" value="{{ $customer->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>


                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    var CustomerTable;

    $(document).ready(function () {
        CustomerTable = $('#customer_table').DataTable();
        
        $('body').on('click', '.delete', function(){
            var id = $(this).val();
            var atr = $(this);
            Swal.fire({
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                title: 'Are You Sure!',
                html: '<span><b>This Action cannot be undone!</b></span> <br> <span>Do you want to Delete this customer?</span>'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('customers') }}/" + id,
                        method: "DELETE",
                        dataType: "json",
                        data: {id: id, '_token': '{{ csrf_token() }}'},

                        success: function (data) {
                            if (data.response == "success") {
                                toastr.success("Customer Deleted Successfully!");
                                CustomerTable.row(atr.parents('tr')).remove().draw();
                            } else if (data.response == "error") {
                                toastr.error("Something Went Wrong!");
                            }
                        }
                    })
                }
            });
        });

        $('#add_customer').click(function () {

            const card_number = document.getElementById('credit_card_number').value;
            $card_type = '';
            try {
                $card_type = isValidCreditCardNumber(card_number);

                $.ajax({
                    url: "{{ url('customers') }}",
                    method: "post",
                    dataType: "json",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'full_name': $('#full_name').val(),
                        'address': $('#address').val(),
                        'email': $('#email').val(),
                        'phone': $('#phone').val(),
                        'credit_card_number': $('#credit_card_number').val(),
                        'csvInput': $('#csvInput').val(),
                        'name_on_card': $('#name_on_card').val(),
                        'expired_date': $('#expired_date').val(),
                        'type': $card_type,
                    },

                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log('success');
                            // alert(data.success);
                        } else {
                            printErrorMsg(data.error);
                        }

                        if (data.response == "success") {
                            toastr.success("Customer Added Successfully!");
                            $("#customer_add_form").trigger("reset");
                            $('#addModal').find('.close').trigger('click');

                            location.reload();

                        } else if (data.response == "error") {
                            toastr.error("Something Went Wrong!");
                        }
                    }
                });


            } catch (error) {

                const errorMessageElement = document.getElementById('card_number_err');
                errorMessageElement.textContent = error.message;
            }


            function printErrorMsg(msg) {
                $.each(msg, function (key, value) {
                    $('.' + key + '_err').text(value);
                });
            }
        });
        $('body').on('click', '.edit', function(){
            var Id = $(this).val();
            $.ajax({
                url:"./customers/"+Id+"/edit",
                method:"GET",
                dataType:"json",
                success:function(data){
                    if(data){
                        console.log(data);

                        $('#edit_full_name').val(data[0].full_name);
                        $('#edit_address').val(data[0].address);
                        $('#edit_email').val(data[0].email);
                        $('#edit_phone').val(data[0].phone);
                        $('#edit_credit_card_number').val(data[1].card_number);
                        $('#edit_csvInput').val(data[1].csv);
                        $('#edit_name_on_card').val(data[1].name_on_card);
                        $('#edit_expired_date').val(data[1].expired_date);
                        $('#update_customer').attr('data-id', data[0].id);
                        $('#editModal').modal('show');
                    }
                },
            });
        });

        $('.update_customer').click(function () {
            var Id = $(this).attr('data-id');
            const card_number = document.getElementById('edit_credit_card_number').value;

            $card_type = '';
            try {
                $card_type = isValidCreditCardNumber(card_number);

                $.ajax({
                    url:"./customers/"+Id,
                    method: "PUT",
                    dataType: "json",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'edit_full_name': $('#edit_full_name').val(),
                        'edit_address': $('#edit_address').val(),
                        'edit_email': $('#edit_email').val(),
                        'edit_phone': $('#edit_phone').val(),
                        'edit_credit_card_number': $('#edit_credit_card_number').val(),
                        'edit_csv': $('#edit_csvInput').val(),
                        'edit_name_on_card': $('#edit_name_on_card').val(),
                        'edit_expired_date': $('#edit_expired_date').val(),
                        'edit_type': $card_type,
                    },

                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log('success');
                            // alert(data.success);
                        } else {
                            printErrorMsg(data.error);
                        }

                        if (data.response == "success") {
                            toastr.success("Customer Updated Successfully!");
                            $("#customer_edit_form").trigger("reset");
                            $('#editModal').find('.close').trigger('click');

                            location.reload();

                        } else if (data.response == "error") {
                            toastr.error("Something Went Wrong!");
                        }
                    }
                });


            } catch (error) {


                const errorMessageElement2 = document.getElementById('edit_card_number_err');
                errorMessageElement2.textContent = error.message;
            }


            function printErrorMsg(msg) {
                $.each(msg, function (key, value) {
                    $('.' + key + '_err').text(value);
                });
            }
        });
    });

    // check card validity
    function isValidCreditCardNumber(cardNumber) {
        // Remove spaces and non-numeric characters from the card number
        cardNumber = cardNumber.replace(/\s/g, '');

        // Check if the card number contains only digits and is a valid length
        if (!/^\d+$/.test(cardNumber) || cardNumber.length !== 16) {
            throw new Error('Invalid Card Number');
        }

        let sum = 0;
        let doubleUp = false;

        for (let i = cardNumber.length - 1; i >= 0; i--) {
            let digit = parseInt(cardNumber.charAt(i), 10);
            if (doubleUp) {
                digit *= 2;
                if (digit > 9) {
                    digit -= 9;
                }
            }
            sum += digit;
            doubleUp = !doubleUp;
        }

        if (sum % 10 === 0) {
            return getCardType(cardNumber);
        } else {
            throw new Error('Invalid Card Number');
        }
    }

    // check card type
    function getCardType(cardNumber) {
        // Define regular expressions for each card type's IIN/BIN patterns
        const cardPatterns = {
            visa: /^4/,
            mastercard: /^5[1-5]/,
            amex: /^3[47]/,
            discover: /^6(?:011|5)/,
        };

        // Check each card type to determine the match
        for (const cardType in cardPatterns) {
            if (cardPatterns.hasOwnProperty(cardType) && cardPatterns[cardType].test(cardNumber)) {
                return cardType;
            }
        }
        throw new Error('Unknown Card Type');
    }

    // expire date input js
    function formatString(event) {
        const inputValue = event.target.value.replace(/\D/g, ''); // Remove non-digits
        const formattedValue = inputValue
            .replace(/^(\d{2})(\d{0,2})$/, '$1/$2') // Format as MM/YY
            .replace(/\/\//g, '/'); // Remove extra slashes

        event.target.value = formattedValue;
    }

    // csv check
    document.addEventListener('DOMContentLoaded', function () {
        const csvInput = document.getElementById('csvInput');

        csvInput.addEventListener('input', function () {
            // Remove any non-numeric characters
            this.value = this.value.replace(/\D/g, '');

            // Limit the input to 3 characters
            if (this.value.length > 3) {
                this.value = this.value.slice(0, 3);
            }
        });
    });
</script>
