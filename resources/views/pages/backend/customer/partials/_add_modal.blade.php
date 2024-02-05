<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="exampleModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <form> --}}
            <form action="" method="post" id="customer_add_form">
                @csrf
                <div class="row" >
                    <b class="">Personal Information</b>
                </div>
                <hr class="mt-1 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" required>
                        <span class="text-danger error-text full_name_err"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
                    <span class="text-danger error-text address_err"></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <span class="text-danger error-text email_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        <span class="text-danger error-text phone_err"></span>
                    </div>
                </div>


                <div class="row mt-3" >
                    <b class="">Card Information</b>
                </div>
                <hr class="mt-1 mb-3">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Card Number</label>
                        <input type="number" class="form-control" id="credit_card_number" name="card_number" placeholder="Card Number" required>
                        <span class="text-danger error-text card_number_err text-end" id="card_number_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">CSV</label>
                        <input maxlength="3" type="text" class="form-control" id="csvInput" name="csv" placeholder="CSV" required>
                        <span class="text-danger error-text csv_err"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" placeholder="Name" name="name_on_card" required>
                        <span class="text-danger error-text name_on_card_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Expired Date</label>
                        <input maxlength='5'  class="form-control" id="expired_date"  name="expired_date" placeholder="MM/YY" type="text" onkeyup="formatString(event);" required>
                        <span class="text-danger error-text expired_date_err"></span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary float-right " id="add_customer">Save</button>

            </form>
              {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
