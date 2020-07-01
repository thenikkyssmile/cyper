<?php
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning">','</i></div>');

echo form_open(base_url('admin/user/tambah'));
?>

<div class="col-md-6">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama')?>" required> 
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email')?>" required> 
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>" required> 
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>" required> 
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Level hak akses</label>
        <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
    </div>
    <div class="form-group">
        <label>Keterangan Lain</label>
        <textarea name="keterangan" class="form-control" style="resize:none;" placeholder="Keterangan" value="<?php echo set_value('keterangan')?>"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Simpan">
        <input type="reset" name="reset" class="btn btn-default" value="Reset">
    </div>
</div>

<?php
echo form_close();
?>