<!doctype html>
<html lang="en">
    <body>
        @if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif

        <form action="create_admin" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="name" class="form-control" required/>

            <input type="text" name="phone" placeholder="phone" class="form-control" required/>

            <input type="text" name="email" placeholder="email" class="form-control" required/>

            <input type="text" name="staff_unit" placeholder="Staff Unit" class="form-control" required/>

            <input type="text" name="staff_unit_id" placeholder="Staff Unit Id" class="form-control"required/>

            <input type="text" name="branch" placeholder="branch" class="form-control" required/>

            <input type="file" name="profile_picture" placeholder="Profile Picture" class="form-control" required/>

            <input type="text" name="username" placeholder="username" class="form-control" required/>

            <input type="text" name="password" placeholder="password" class="form-control" required/>

            <input type="submit" value="Create Admin" />
        </form>

        <table id="paidTable" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Staff Unit</th>
                    <th>Staff Unit Id</th>
                </tr>
            </thead>    
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->phone}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->staff_unit}}</td>
                    <td>{{$admin->staff_unit_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>        
