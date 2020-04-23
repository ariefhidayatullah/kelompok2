<style>
  @import "compass";

// Stepper
.stepper {
    .nav-tabs {
        position: relative;
    }
    .nav-tabs > li {
        width: 25%;
        position: relative;
        &:after {
            content: '';
            position: absolute;
            background: #f1f1f1;
            display: block;
            width: 100%;
            height: 5px;
            top: 30px;
            left: 50%;
            z-index: 1;
        }
        &.completed {
            &::after {
                background: #34bc9b;
            }
        }
        &:last-child {
            &::after {
                background: transparent;
            }
        }
        &.active:last-child {
            .round-tab {
                background: #34bc9b;
                &::after {
                    content: '✔';
                    color: #fff;
                    position: absolute;
                    left: 0;
                    right: 0;
                    margin: 0 auto;
                    top: 0;
                    display: block;
                }
            }
        }
    }
    .nav-tabs [data-toggle='tab'] {
        width: 25px;
        height: 25px;
        margin: 20px auto;
        border-radius: 100%;
        border: none;
        padding: 0;
        color: #f1f1f1;
    }
    .nav-tabs [data-toggle='tab']:hover {
        background: transparent;
        border: none;
    }
    .nav-tabs > .active > [data-toggle='tab'], .nav-tabs > .active > [data-toggle='tab']:hover, .nav-tabs > .active > [data-toggle='tab']:focus {
        color: #34bc9b;
        cursor: default;
        border: none;
    }
    .tab-pane {
        position: relative;
        padding-top: 50px;
    }
    .round-tab {
        width: 25px;
        height: 25px;
        line-height: 22px;
        display: inline-block;
        border-radius: 25px;
        background: #fff;
        border: 2px solid #34bc9b;
        color: #34bc9b;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 14px;
        
    }
    .completed .round-tab{
      background: #34bc9b;
      &::after {
        content: '✔';
        color: #fff;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 0;
        display: block;
        }
    }
    .active .round-tab {
        background: #fff;
        border: 2px solid #34bc9b;
        &:hover {
            background: #fff;
            border: 2px solid #34bc9b;
        }
        &::after {
            display: none;
        }
    }
    .disabled .round-tab {
        background: #fff;
        color: #f1f1f1;
        border-color: #f1f1f1;
        &:hover {
            color: #4dd3b6;
            border: 2px solid #a6dfd3;
        }
        &::after {
            display: none;
        }
    }
}
</style>


<!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/transaksi.css">
<script src="<?= BASEURL; ?>/js/transaksi.js"></script> -->
<br><br><br><br><br><br><br><br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">

      <div class="stepper linear">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab" aria-controls="stepper-step-1" role="tab" title="Step 1">
              <span class="round-tab">1</span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab" aria-controls="stepper-step-2" role="tab" title="Step 2">
              <span class="round-tab">2</span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab" aria-controls="stepper-step-3" role="tab" title="Step 3">
              <span class="round-tab">3</span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a class="persistant-disabled" href="#stepper-step-4" data-toggle="tab" aria-controls="stepper-step-4" role="tab" title="Complete">
              <span class="round-tab">4</span>
            </a>
          </li>
        </ul>
        <form role="form">
          <div class="tab-content">
            <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
              <h3 class "h2">1. Select Payment Type</h3>
              <p>This is step 1</p>
              <ul class="list-inline pull-right">
                <li>
                  <a class="btn btn-primary next-step">Next</a>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
              <h3 class "h2">2. Enter Payment Information</h3>
              <p>This is step 2</p>
              <ul class="list-inline pull-right">
                <li>
                  <a class="btn btn-default prev-step">Back</a>
                </li>
                <li>
                  <a class="btn btn-primary next-step">Next</a>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
              <h3 class="hs">3. Review and Submit Payment</h3>
              <p>This is step 3</p>
              <ul class="list-inline pull-right">
                <li>
                  <a class="btn btn-default prev-step">Back</a>
                </li>
                <li>
                  <a class="btn btn-default cancel-stepper">Cancel Payment</a>
                </li>
                <li>
                  <a class="btn btn-primary next-step">Submit Payment</a>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
              <h3>4. All done!</h3>
              <p>You have successfully completed all steps.</p>
            </div>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>

<script>
  $(function(){

  $('.tombolTambahData').on('click', function(){

    $('#judulModal').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
  }); 


  $('.tampilModalUbah').on('click', function(){

    $('#judulModal').html('Ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: 'http://localhost/php/phpmvc/public/mahasiswa/getUbah',
      data: {id : id},
      method: 'post',
      dataType: 'json',
      success: function(data){
        console.log('okee');
      
      }
    });


  });
});
</script>