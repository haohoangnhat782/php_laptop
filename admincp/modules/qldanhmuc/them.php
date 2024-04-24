
<div class="main-content">
        <h1>Thêm danh mục</h1>
        <div id="content-box">
           
                <div class = "container">
            
                <form id="editing-form" method="POST" action="modules/qldanhmuc/xuly.php"  enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên danh mục: </label>
                        <input type="text" name="tendanhmuc" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <button class="btn-submit" name="themdanhmuc"> Thêm danh mục</button>
                </form>
           
                <div class="clear-both"></div>
                <script>
                    function validateForm(){
                        var tendanhmuc=document.forms["editing-form"]["tendanhmuc"].value;
                         
        if (tendanhmuc.trim() === "" ) {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }

 return true;

                    }
               
                    CKEDITOR.replace('product-content');
                </script>
  
        </div>
    </div>

  