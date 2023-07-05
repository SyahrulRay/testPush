<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
    <h1 class="text-3xl font-thin text-zinc-400"> Transaction History </h1>
    <?php if (count($complete) > 0) { ?>
        <?php foreach ($complete as $complete) : ?>

            <div class="mt-6 -mb-6 flow-root border-t border-gray-200 divide-y divide-gray-200">
                <div class="py-6 sm:flex">
                    <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                        <!-- <img src="<?php echo base_url() ?>assets/content/<?php $complete->id; ?>.jpg" alt="Brass puzzle in the shape of a jack with overlapping rounded posts." class="flex-none w-20 h-20 rounded-md object-center object-cover sm:w-48 sm:h-48"> -->
                        <div class="pt-1.5 min-w-0 flex-1 sm:pt-0">
                            <h3 class="text-lg font-medium text-gray-200">
                                <a href="#"><?= $complete->item_name ?></a>
                            </h3>
                            <p class="text-xs text-zinc-400"><?= $complete->created_at ?> </p>
                            <p class="mt-1 font-medium text-lg text-gray-200">Rp. <?= $complete->price * $complete->quantity ?></p>
                        </div>
                    </div>
                    <div class="mt-6 space-y-4 sm:mt-0 sm:ml-6 sm:flex-none sm:w-40">
                        <a class="w-full flex items-center justify-center text-lg bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm  font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-full sm:flex-grow-0" href="<?= base_url('invoice/cartInv/' . $complete->invoice_id) ?>"><i data-feather="download" class="bg-transparent download-icon m-2"></i> invoice</a>
                    </div>
                </div>

                <!-- More products... -->
            </div>
        <?php endforeach ?>
    <?php } else { ?>
        <div class="w-full h-10/12 flex justify-center h-screen items-center">
            <h1 class="text-3xl font-thin text-zinc-800"> No History </h1>
        </div>
    <?php } ?>
</div>

<?= $this->endSection(); ?>