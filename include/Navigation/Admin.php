<li class="nav-link">
        <a href="Dashboard"><i class="bi bi-house me-3"></i>Dashboard</a>
</li>
<li class="nav-link">
    <a href="ListProducts"><i class="bi bi-receipt me-3"></i></i>Manage Products</a>
</li>
<li class="nav-link">
    <a href="ManageOurTeam"><i class="bi bi-receipt me-3"></i></i>Manage NGO Team</a>
</li>
<li class="nav-link">
    <a href="ManageReceiptBooks"><i class="bi bi-receipt me-3"></i></i>Manage Receipt Book</a>
</li>
<li class="nav-link">
    <a href="IssueReceiptBook"><i class="bi bi-person-video2 me-3"></i></i>Issue Receipt Book</a>
</li>
<li class="nav-link">
    <a href="Donations"><i class="bi bi-box2-heart me-3"></i></i>Donations</a>
</li>
<li class="nav-link">
    <a href="ViewAllCompaign"><i class="bi bi-patch-plus me-3"></i>Manage Fundraising Campaign</a>
</li>
<li class="nav-link">
    <a href="ListSuccessStories"><i class="bi bi-hourglass-split me-3"></i>Success Stories</a>
</li>
<li class="nav-link">
    <a href="Users"><i class="bi bi-people me-3"></i>Manage Users</a>
</li>
<hr>
<li class="nav-link">
    <a href="websitequeries"><i class="bi bi-question-square me-3"></i>Website Queries
        <?php if ($unSeenWebsiteQuery > 0): ?>
            <span class="ms-2 badge rounded-pill bg-danger">
                <?php echo ($unSeenWebsiteQuery > 9) ? '9+' : $unSeenWebsiteQuery; ?>
                <span class="visually-hidden">unSeen Website Queries</span>
            </span>
        <?php endif; ?>
    </a>
</li>