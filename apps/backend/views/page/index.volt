<div class="row">

    <div class="large-12 medium-12 small-12 columns">

        <ul class="side-nav">
            {% for link in links %}
                <li class="left"><a href="#" id="{{ link['id'] }}">{{ link['name'] }}</a></li>
            {% endfor %}

        </ul>
    </div>

    <div id="form" class="hider large-12 medium-12 small-12 columns">
        {{ form('', 'method': 'post') }}
        {%  for inputs in form %}
        <div class="large-12 columns">
            {{ inputs.Label() }}
            {{ inputs }}
        </div>
        {% endfor %}
        <div class="large-12 medium-12 small-12 columns">
            {{ submit_button("GEM", "class": "button radius right") }}
        </div>
        {{ end_form() }}
        <h4>Eksempel konverteret til html, fra parsedown</h4>
    </div>

    <div class="large-12 medium-12 small-12 columns">
        <h1 id="header">{{ item.title }}</h1>
    </div>

    <div class="large-12 medium-12 small-12 columns">

        {% if item.img != null %}
            <div class="right large-5 medium-5 small-12">
                <ul class="small-block-grid-1">
                    <li id="image">
                        {{ image("img/" ~ item.img, "alt": item.title, "class": "th") }}
                    </li>
                </ul>
            </div>
        {% endif %}
        <p id="text">
            {{ item.txt }}
        </p>
    </div>
</div>