<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <?php
         echo $this->element('flash/side_bar')?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                             
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                      
                                            <?= $this->Html->link(__('logout'), ['action' => 'logout'],['class'=>'btn btn-primary']) ?>
                                     </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <label for="">Select Categories</label>
                        <select name="category_id" id="category_id" class="form-control">
                           <option value="" disabled selected>choose category</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select><br>
                        <input id="myInput" type="text" placeholder="Search.." class="form-control mb-4">
                        <div class="row">
                            <div class="container-fluid">
                                <h2 class="title-1 m-b-25">All Products Listing</h2>
                                 <?php echo $this->element('flash/user_index')?>
                            </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <script>
$(document).ready(function(){
    $('#change').change(function(){
        $.ajax({
            method:'GET'


        })


    });


//   $("#myInput").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("tr ").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });
// function deletesweet(){

//     swal({
//     title: "Are you sure?",
//     text: "Once deleted, you will not be able to recover this imaginary file!",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//       swal("Poof! Your imaginary file has been deleted!", {
//         icon: "success",
//       });
//     } else {
//       swal("Your imaginary file is safe!");
//     }
  });
// }  
</script>
