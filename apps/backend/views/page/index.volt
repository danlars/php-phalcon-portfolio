<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        {#Form area here#}
    </div>

    <div class="large-12 medium-12 small-12 columns">
        <h1>{{ item.title }}</h1>
    </div>

    <div class="large-12 medium-12 small-12 columns">

        {% if item.img != null %}
            <div class="right large-5 medium-5 small-12">
                <ul class="small-block-grid-1">
                    <li>
                        {{ image("img/" ~ item.img, "alt": item.title, "class": "th") }}
                    </li>
                </ul>
            </div>
        {% endif %}
        <p>
            {{ item.txt }}
        </p>
    </div>
</div>