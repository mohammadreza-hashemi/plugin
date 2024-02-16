<?php
require 'add_order_to_user.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Sookht_jet </h1>
        <p>add order to user</p>
    </div>

    <div class="container mt-5">
        <?php
        if (!empty($error)) {
            echo '
               <div class="alert alert-danger">
                    <strong>خطا  :</strong>' . esc_attr($error) . '
                </div>
            ';
        }
        ?>

        <div class="row">
            <form method="POST">
                <?php echo wp_nonce_field('add_order_action', 'add_order') ?>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                </div>
                <button type="submit" name="button" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    </body>
    </html>
