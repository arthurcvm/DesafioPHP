<?php
require_once 'vendor/autoload.php';

// Header
include_once 'includes/header.php';
?>

<?php
$dao = new \App\Model\ProductTypeDao();
if (isset($_POST['submitBtn'])) {
    $name = $_POST['name'];
    $tax = $_POST['tax'];

    $pt = new \App\Model\ProductType();
    $pt->setName($name);
    $pt->setTax($tax);

    $dao->create($pt);
}
?>

<div class="row justify-content-between mb-2">
    <h3> Tipos de produtos </h3>
</div>

<form action="" method="POST">
    <div class="form-row justify-content-start">
        <div class="form-group col-md-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-md-3">
            <label for="tax">Alíquota</label>
            <input type="text" class="form-control" id="tax" name="tax">
        </div>
        <button type="submit" style="height: 40px; margin-top: 30px;" class="btn btn-success" name="submitBtn">Cadastrar</button>
    </div>
</form>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Alíquota</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($dao->read() as $p) {
            ?>
                <tr>
                    <td><?php echo $p['name']; ?></td>
                    <td><?php echo $p['tax']; ?></td>
                </tr>
            <?php
            } ?>

        </tbody>
    </table>
    <br>
</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>