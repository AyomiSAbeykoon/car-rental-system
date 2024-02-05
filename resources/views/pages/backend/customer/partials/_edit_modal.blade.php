<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Customer</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body edit_modal">
            {{-- <form> --}}
            <form action="" method="post" id="customer_edit_form">
                @csrf
                <div class="row" >
                    <b class="">Personal Information</b>
                </div>
                <hr class="mt-1 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" id="edit_full_name" placeholder="Full Name" name="edit_full_name" value="" required>
                        <span class="text-danger error-text edit_full_name_err"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="edit_address" placeholder="Address" name="edit_address" value="" required>
                    <span class="text-danger error-text edit_address_err"></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Email" value="" required>
                        <span class="text-danger error-text edit_email_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" id="edit_phone" name="edit_phone" placeholder="Phone"  value="" required>
                        <span class="text-danger error-text edit_phone_err"></span>
                    </div>
                </div>


                <div class="row mt-3" >
                    <b class="">Card Information</b>
                </div>
                <hr class="mt-1 mb-3">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Card Number</label>
                        <input type="number" class="form-control" id="edit_credit_card_number" name="edit_card_number" placeholder="Card Number" value="" required>
                        <span class="text-danger error-text edit_card_number_err text-end" id="edit_card_number_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">CSV</label>
                        <input maxlength="3" type="text" class="form-control" id="edit_csvInput" name="edit_csv" placeholder="CSV" value="" required>
                        <span class="text-danger error-text edit_csv_err"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Name on Card</label>
                        <input type="text" class="form-control" id="edit_name_on_card" placeholder="Name" name="edit_name_on_card" value="" required>
                        <span class="text-danger error-text edit_name_on_card_err"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Expired Date</label>
                        <input maxlength='5'  class="form-control" id="edit_expired_date"  name="edit_expired_date" placeholder="MM/YY" type="text" onkeyup="formatString(event);" value="" required>
                        <span class="text-danger error-text edit_expired_date_err"></span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary float-right update_customer" id="update_customer" data-id="">Save</button>

            </form>
              {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
