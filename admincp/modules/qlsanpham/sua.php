
<div class="main-content">
        <h1>THem san pham</h1>
        <div id="content-box">
           
                <div class = "container">
            
                <form id="editing-form" method="POST" action=""  enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="name" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
      
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    

                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
               
                    CKEDITOR.replace('product-content');
                </script>
  
        </div>
    </div>

  