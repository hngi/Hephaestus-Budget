<?php
session_start();
include_once("db.php");
if (!isset($_SESSION['user'])) {
    header("location: ./login.php");
} else {
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registered_user WHERE id = {$_SESSION['user']}"));
}
$title = " | Home";
$switcherdisplay = "display: inline";
include_once("./components/header.php");
include_once("./components/sidebar.php");
?>

<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="uk-text-muted uk-text-small">New Budgets</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="uk-text-muted uk-text-small">My Budgets</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="uk-text-muted uk-text-small">Allocate Budget</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("./components/footer.php");
?>