<?php
require_once 'vendor/autoload.php';

// Header
include_once 'includes/header.php';
?>

<?php
$dao = new \App\Model\ProductDao();
$pDao = new \App\Model\ProductDao();
$ptDao = new \App\Model\ProductTypeDao();
$sDao = new \App\Model\SaleDao();

$product_types = $ptDao->read();
$products = $pDao->read();

if (isset($_POST['submitBtn'])) {
    $quantities = $_POST['quantity'];
    $products_id = $_POST['product_id'];
    $total_sale = $_POST['totalSale'];

    $s = new \App\Model\Sale();
    $s->setDateSale(date("Y-m-d"));
    $s->setTotal($total_sale);

    $sale_id = $sDao->create($s);

    for ($i = 0; $i < count($quantities); $i++) {
        $si = new \App\Model\SaleItem();
        $si->setQuantity($quantities[$i]);
        $si->setProductId($products_id[$i]);
        $si->setSaleId($sale_id);
    }
}
?>

<div class="row justify-content-between mb-2 mt-2">
    <h3> Vendas </h3>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newSaleModal">
        Nova venda
    </button>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Valor total</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($sDao->read() as $s) {
            ?>
                <tr>
                    <td><?php echo $s['date_sale']; ?></td>
                    <td><?php echo $s['total']; ?></td>
                </tr>
            <?php
            } ?>

        </tbody>
    </table>
    <br>
</div>
</div>

<!-- Modal New Sale -->
<div class="modal fade" id="newSaleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSaleModalLabel">Nova venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-row justify-content-start">
                        <div class="form-group col-md-3">
                            <label for="product_id">Item</label>
                            <select class="form-control" id="product_id" name="product_id">
                                <option value="" hidden selected>Selecione</option>
                                <?php
                                foreach ($pDao->read() as $p) {
                                ?>
                                    <option value="<?php echo $p['id']; ?>">
                                        <?php echo $p['name']; ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="quantity">Quantidade</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                        <button type="button" style="height: 40px; margin-top: 30px;" class="btn btn-success" id="addBtn">Adicionar</button>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <table class="table table-responsive table-striped" id="saleItems">
                                <thead>
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Alíquota</th>
                                        <th scope="col">Qtd</th>
                                        <th scope="col">SubTotal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-between">
                            <h5>Total Imposto: <b>R$<span id="totalTax">0,00</span></b></h5>
                            <h5>Total Venda: <b>R$<input type="text" size="10" id="totalSale" name="totalSale" readonly="readonly" style="border: 0; background: transparent;" /></b></h5>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" name="submitBtn">Lançar venda</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>