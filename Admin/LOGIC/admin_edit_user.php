 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<i class="fas fa-edit"></i>
 Sửa thành viên
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">


            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm thành viên</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            
            <div class="modal-body">
            
             <form action="" method="post">
                  <div class="">
                    <h4> USERNAME</h4>
                    <input type="text" name="username"required>
                   
                  </div>

                  <div class="">
                  <h4> EMAIL</h4>
                    <input type="email" name="email"required>
                   
                  </div>


                  <div class="">
                  <h4>  PASSWORD</h4>
                    <input type="password" name="password" required>
                  
                  </div>



                  <div class="">
                  <h4>  ADDRESS</h4>
                    <input type="text" name="address">
                  
                  </div>

                  <div class="">
                  <h4>  ROLE</h4>
                   <select name='role'>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                   </select>
                  
                  </div>


             </form>
            </div>

           

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="adduser" class="btn btn-primary" value="Add new user">Edit</button>
            </div>
          </div>
        </div>
      </div>