<div class="row">
    <div class="large-6 medium-6 small-12 columns">
    {{ form('contact/send', 'method': 'post') }}
        {%  for item in form %}
            <div class="large-12 columns">
                {{ item.Label() }}
                {{ item }}
            </div>
        {% endfor %}
        <div class="large-12 medium-12 small-12 columns">
            {{ submit_button("SEND", "class": "button radius right") }}
        </div>
    {{ end_form() }}

    </div>
</div>