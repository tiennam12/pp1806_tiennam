
<table class="table">
     
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User list</div>
                    <td>Id</td>
                    <td>name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                <?php foreach($allUsers as $user):  ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><a href="user/<?php echo $user['id'];?>"><?php echo $user['name']; ?></a></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="user/edit/<?php echo $user['id'];?>"> Edit</a>
                        <a href="user/delete/<?php echo $user['id'];?>"> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </table>
                <div class="card-body">          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

