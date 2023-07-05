<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
    <form method="post" class="flex flex-col gap-4 h-full" action="<?= base_url('update_cart_status') ?>">
        <h1 class="text-3xl font-thin text-gray-200"> Pending Orders </h1>
        <?php if (count($pending) > 0) { ?>
            <?php foreach ($pending as $pending) : ?>
                <input type="hidden" name="cart_name[]" value="<?= $pending->item_name ?>">
                <input type="hidden" name="cart_quantity[]" value="<?= $pending->quantity ?>">
                <a href="<?= base_url('transaction/cartTransaction/') . $pending->id ?>">
                    <div class="mt-6 -mb-6 m-8flow-root border-t border-gray-200 divide-y divide-gray-200">
                        <div class="py-6 sm:flex">
                            <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                                <div class="pt-1.5 min-w-0 flex-1 flex flex-col gap-2 sm:pt-0">
                                    <h3 class="text-lg font-medium text-gray-200">
                                        <a href="<?= base_url('transaction/cartTransaction/') . $pending->id ?>"><?= $pending->item_name ?></a>
                                    </h3>
                                    <p class="mt-1 font-medium text-lg text-gray-200">Rp. <?= $pending->price * $pending->quantity ?></p>
                                    <input type="checkbox" name="cart_id[]" value="<?= $pending->id ?>" class="checkbox border-slate-200 border-opacity-50">
                                </div>
                            </div>
                            <div class="mt-6 space-y-4 sm:mt-0 sm:ml-6 sm:flex-none sm:w-40">
                                <label class="trash-icon w-full flex items-center justify-center text-lg bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm  font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-full sm:flex-grow-0" data-id="<?= $pending->id ?>" for="my-modal-6"><i data-feather="trash" class="bg-transparent trash-icon"></i></label>
                            </div>
                        </div>

                        <!-- More products... -->
                    </div>
                </a>

            <?php endforeach ?>
            <div class="w-full flex justify-end bottom-0 items-center rounded-lg p-5 bg-zinc-800 shadow-lg sticky">
                <button id="buy" class="btn bg-zinc-500 text-slate-200" type="submit">Buy Selected</button>
            </div>
    </form>
<?php } else { ?>
    <div class="w-full h-10/12 flex justify-center h-screen items-center">
        <h1 class="text-3xl font-thin text-zinc-800"> Your Cart is Empty </h1>
    </div>
<?php } ?>
</div>

<!-- The button to open modal -->


<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle text-zinc-800">
    <div class="modal-box bg-slate-50">
        <div class="flex flex-row gap-3 items-center">
            <i data-feather="x-circle" class="w-14 h-14 text-red-500"></i>
            <h3 class="font-light text-lg text-zinc-800">Are you sure you want to cancel your order?</h3>
        </div>
        <div class="modal-action">
            <label for="my-modal-6" class="btn bg-transparent border-zinc-700 w-24 text-zinc-800">No</label>
            <a id="deleteBtn" class="btn bg-red-500 border-none w-24 text-zinc-700 px-8"> Yes </a>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('.trash-icon').click(function() {
            //get cover id
            var id = $(this).data('id');
            //set href for cancel button
            $('#deleteBtn').attr('href', '<?= base_url('cart/cancel/') ?>' + id);
        })

        $('#buy').attr("disabled", true);

        $('.checkbox').change(function() {
            $('#buy').attr('disabled', $('.checkbox:checked').length == 0);
        });

    });
</script>

<?= $this->endSection(); ?> -->