<?php
    include 'header.php';
?>

<div class="container mt-3">
    <!-- <div class="container"> -->
        <h1>Register Form</h1>
        <?php echo form_open('admin/sendmail'); ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="width: 400px">
                    <label for="name">Name</label>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'enter your name', 'id'=>'name', 'name'=>'name', 'value'=>set_value('name')]); ?>
                    <!-- here above, sert_value<'username'> is for if there's right username and password is not given then it'll go to error yet it can also have the username with it for better user experience -->
                </div>
            </div>
            <div class="col-lg-6 text-danger" style="margin-top: 38px;">
                <?php
                    echo form_error('name');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="width: 400px">
                    <label for="email">Email</label>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'enter your email', 'id'=>'email', 'name'=>'email', 'value'=>set_value('email')]); ?>
                    <!-- here above, sert_value<'username'> is for if there's right username and password is not given then it'll go to error yet it can also have the username with it for better user experience -->
                </div>
            </div>
            <div class="col-lg-6 text-danger" style="margin-top: 38px;">
                <?php
                    echo form_error('email');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="width: 400px">
                    <label for="username">User Name</label>
                    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'enter username', 'id'=>'username', 'name'=>'username', 'value'=>set_value('username')]); ?>
                    <!-- here above, sert_value<'username'> is for if there's right username and password is not given then it'll go to error yet it can also have the username with it for better user experience -->
                </div>
            </div>
            <div class="col-lg-6 text-danger" style="margin-top: 38px;">
                <?php
                    echo form_error('username');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="width: 400px">
                    <label for="password">Password</label>
                    <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'enter password', 'id'=>'passowrd', 'name'=>'password', 'value'=>set_value('password')]); ?>
                </div>
            </div>
            <div class="col-lg-6 text-danger" style="margin-top: 38px;">
            <?php
                    echo form_error('password');
                ?>
            </div>
        </div>
        <?php echo form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'SUBMIT']); ?>
        <?php echo form_reset(['class'=>'btn btn-secondary', 'value'=>'RESET']); ?>
        
    <!-- </div> -->
</div>

<?php
    include 'footer.php';
?>