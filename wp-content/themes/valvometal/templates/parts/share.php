<ul class="share">
    <h4>Share</h4>

    <ul class="list-unstyled">
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(VM_CURRENT_URI) ?>" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
        </li>

        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(VM_CURRENT_URI) ?>&title=<?= get_the_title() ?>&summary=&source=" target="_blank">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
    </ul>
</ul>