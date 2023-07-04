<div class="text_container container">
    <div class="column mb-4 text-muted">
        <div class="col">
            <form id="address_form" action="/save" method="post">
                <input type="hidden" name="csrf_token" value="<?= CSRF::generateCSRFToken() ?>">
                <textarea
                        name="text"
                        id="text"
                        class="md-textarea form-control"
                        rows="3"
                        style="white-space: pre-wrap;"
                ><?= $last_inserted_text ?></textarea>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

