<div class="text-end">
    <a class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
    <i class="bi bi-list me-2"></i> Show Navigation Menu
    </a>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title nav-link text-dark" id="offcanvasExampleLabel">Navigation Menu</h5>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php include $navfile; ?>
  </div>
</div>