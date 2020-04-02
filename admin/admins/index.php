<?php  require_once('../../project_files/initialize.php');?>
<?php 
$page_title = 'Admins list';
include(PRIVATE_PATH.'/private_header.php');?>

<?php
$admins = Admin::find_all();
?>

<main>
    <div class="inside">
        <h1>Admin</h1>
        <a href="<?php echo url_for('/admin/admins/new.php');?>">Crea un nuovo admin</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Username</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($admins as $admin) {?>
            <tr>
                <td><?php echo h($admin->id);?></td>
                <td><?php echo h($admin->nome);?></td>
                <td><?php echo h($admin->cognome);?></td>
                <td><?php echo h($admin->email);?></td>
                <td><?php echo h($admin->username);?></td>
                <td><a href="<?php echo url_for('/admin/admins/show?id='. h(u($admin->id)));?>">VIEW</a></td>
                <td><a href="<?php echo url_for('/admin/admins/edit?id='. h(u($admin->id)));?>">EDIT</a></td>
                <td><a href="<?php echo url_for('/admin/admins/delete?id='. h(u($admin->id)));?>">DELETE</a></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</main>

<?php include(PRIVATE_PATH.'/private_header.php');?>