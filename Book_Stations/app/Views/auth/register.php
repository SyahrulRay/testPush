<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Contact Form Template</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class>
    <section class="bg-gray-800 min-h-screen flex items-center justify-center ">
        <!-- login container -->
        <div class="bg-gray-700 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center m-10">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold  text-gray-400 ml-14   text-4xl">Sign Up</h2>

                <form method="post" action="<?= base_url(''); ?> register/process" class="flex flex-col gap-4">
                    <input type="text" name="username" id="username" placeholder="Username" class="p-2 mt-4 rounded-xl border input-accent" required autofocus>
                    <input type="password" name="password" id="password" placeholder="Password" class="p-2  rounded-xl border input-accent" required>
                    <input type="password" name="password_conf" id="password_conf" placeholder="Confirm Password" class="p-2  rounded-xl border input-accent" required>
                    <input type="text" name="name" id="name" placeholder="Full Name" class="p-2  rounded-xl border input-accent" required autofocus>
                    <input type="date" name="birth_date" id="birth_date" class="p-2 rounded-xl border input-accent" placeholder="Birth Date" required>
                    <textarea name="address" id="address" class="p-2 rounded-xl border input-accent" placeholder="Address"></textarea>
                    <button class="bg-gradient-to-r from-green-500 to-green-700 rounded-xl text-white py-2 hover:scale-105 duration-300">Sign Up</button>
                </form>

                <!-- <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>

                <button class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-gray-400">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                    </svg>
                    Login with Google
                </button> -->

                <!-- <div class="mt-3 text-xs flex justify-between items-center text-gray-400">
                    <p>Don't have an account?</p>
                    <a class="cursor-pointer text-blue-500 hover:text-gray-600" href="/register">Sign up</a>
                </div> -->
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl " src="https://www.littlestepsasia.com/wp-content/uploads/2019/12/Top-Bookstores-In-Jakarta-Featured.jpg">
            </div>
        </div>
    </section>
</body>

</html>