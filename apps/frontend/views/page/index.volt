<div class="row">
    <h2>{{ item.title }}</h2>
    <p>
        {{ item.txt }}
        {% if item.img != null %}
            <div class="right large-5 medium-5 small-12">
                <ul class="small-block-grid-1">
                    <li>
                        {{ image('img/'~item.img, "alt": "Billede", 'class':'th' ) }}
                    </li>
                </ul>
            </div>
        {% endif %}
    </p>
</div>