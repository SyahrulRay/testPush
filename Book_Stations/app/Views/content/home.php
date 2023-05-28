<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="md:flex md:flex-row mt-5 sm:mt-0">
    <div class="md:w-2/5 flex flex-col justify-center items-center mx-10    ">
        <h2 class="font-serif text-5xl text-gray-50  mb-4 text-center md:self-start md:text-left">Book Store</h2>
        <p class="text-center text-gray-100 tracking-wide md:self-start md:text-left">Our online appearance provides you healthy life with organic energy.
            Nature can reduce your chemical risk. We ready to serve organic items.</p>
        <a href="/product" class="bg-gradient-to-r from-green-500 to-green-700 rounded-full py-4 px-8 text-xl text-gray-50 md:self-start uppercase my-5 md:text-left text-center">Shop Now</a>
    </div>
    <div class="md:w-3/5">
        <img class="w-full" src="https://www.littlestepsasia.com/wp-content/uploads/2019/12/Top-Bookstores-In-Jakarta-Featured.jpg" alt="Hero Image">
    </div>
</div><!--End Hero Section-->
<?= $this->endSection(); ?>