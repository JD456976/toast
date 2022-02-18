<x-layouts.app>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="accordion-content clearfix">
        <form id="register-form" name="register-form" class="row mb-0" action="#" method="post">
            <div class="col-12 form-group">
                <label for="register-form-name">Name:</label>
                <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <label for="register-form-email">Email Address:</label>
                <input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <label for="register-form-username">Choose a Username:</label>
                <input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <label for="register-form-phone">Phone:</label>
                <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <label for="register-form-password">Choose Password:</label>
                <input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <label for="register-form-repassword">Re-enter Password:</label>
                <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
            </div>

            <div class="col-12 form-group">
                <button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
            </div>
        </form>
    </div>
</x-layouts.app>
