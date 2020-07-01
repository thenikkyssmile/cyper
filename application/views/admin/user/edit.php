<?php
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning">','</i></div>');

echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" required> 
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required> 
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required readonly disabled> 
    </div>
    <div class="form-group">
        <label>Password <span class="text-danger"><small>(Password minimal 6 karakter atau biarkan kosong)</small></span></label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>"> 
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Level hak akses</label>
        <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User" <?php if($user->akses_level=="User") { echo "selected"; } ?> >User</option>
        </select>
    </div>
    <div class="form-group">
        <label>Keterangan Lain</label>
        <textarea name="keterangan" class="form-control" style="resize:none;" placeholder="Keterangan" value="<?php echo $user->keterangan?>"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Simpan">
        <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
</div>

<?php
echo form_close();
?>