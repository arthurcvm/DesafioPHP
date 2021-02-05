<?php
require_once 'vendor/autoload.php';

// Header
include_once 'includes/header.php';
?>

<?php
$dao = new \App\Model\ProductDao();
$ptDao = new \App\Model\ProductTypeDao();
if (isset($_POST['submitBtn'])) {
    $name = $_POST['name'];
    $value = $_POST['value'];
    $product_type_id = $_POST['product_type_id'];

    $p = new \App\Model\Product();
    $p->setName($name);
    $p->setValue($value);
    $p->setTypeProductId($product_type_id);

    $dao->create($p);
}
?>

<div class="row justify-content-between mb-2">
    <h3> Produtos </h3>
</div>

<form action="" method="POST">
    <div class="form-row justify-content-start">
        <div class="form-group col-md-3">
            <label for="numNotaInput">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-md-3">
            <label for="numNotaInput">Valor</label>
            <input type="text" class="form-control" id="value" name="value">
        </div>
        <div class="form-group col-md-3">
            <label for="product_type_id">Tipo</label>
            <select class="form-control" id="product_type_id" name="product_type_id">
                <option value="" hidden selected>Selecione</option>
                <?php
                foreach ($ptDao->read() as $pt) {
                ?>
                    <option value="<?php echo $pt['id']; ?>">
                        <?php echo $pt['name']; ?>
                    </option>
                <?php
                } ?>
            </select>
        </div>
        <button type="submit" style="height: 40px; margin-top: 30px;" class="btn btn-success" name="submitBtn">Cadastrar</button>
    </div>
</form>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo de produto</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($dao->read() as $p) {
            ?>
                <tr>
                    <td><?php echo $p['name']; ?></td>
                    <td><?php echo $p['value']; ?></td>
                    <td><?php echo $p['product_type_id']; ?></td>
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