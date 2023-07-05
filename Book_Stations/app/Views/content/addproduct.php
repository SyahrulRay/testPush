<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>

<div class="flex justify-center m-10">
    <div class="border border-zinc-800 border-opacity-50 rounded-lg  lg:w-8/12">
        <form method="post" action="<?= base_url('admin/addItem') ?>" enctype="multipart/form-data">
            <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max ">
                <h1 class="text-3xl font-thin text-zinc-800 m-3"> Add Items </h1>

                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning w-10/12 mb-3" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success w-10/12 mb-3" role="alert">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>


                <input type="text" name="ItemName" id="ItemName" placeholder="Item Name" class="input w-full input-bordered bg-slate-50 text-black" <?php if (!session('isAdmin')) echo "required"; ?> />
                <input type="text" name="ItemDesc" id="ItemDesc" placeholder="Item Description" class="input w-full h-20 input-bordered bg-slate-50 text-black" <?php if (!session('isAdmin')) echo "required"; ?> />
                <label class="input-group w-full">
                    <span> Rp. </span>
                    <input type="number" name="ItemPrice" id="ItemPrice" min=0 class="input w-full input-bordered bg-slate-50 text-black" <?php if (!session('isAdmin')) echo "required"; ?> />

                </label>

                <label class="input-group w-full">
                    <span> Stock </span>
                    <input type="number" name="ItemStock" id="ItemStock" min=0 class="input w-full input-bordered bg-slate-50 text-black" <?php if (!session('isAdmin')) echo "required"; ?> />

                </label>

                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text text-black">Upload Image</span>
                    </label>
                    <input type="file" accept="image/*" class="file-input file-input-bordered w-full max-w-xs bg-slate-50" id="image1" name="image1" required />

                </div>

                <input type="submit" class="btn bg-slate-100 text-black" value="add data">

            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>