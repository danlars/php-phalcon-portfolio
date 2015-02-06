<div class="row">
    {{ flash.output() }}
    <div class="large-5 large-centered medium-5 medium-centered small-12 columns">
        <fieldset>
            <legend>Administrationslogin</legend>
            {{ form('admin/login/validate', 'method': 'post') }}

            {%  for item in form %}
                {% if is_a(item, 'Phalcon\Forms\Element\Hidden') %}
                {{ item }}
                {% else %}
                    {{ item.Label() }}
                    {{ item }}
                {%  endif %}
            {% endfor %}

            <div class="large-12 medium-12 small-12 columns">
                {{ submit_button("LOGIN", "class": "button radius right") }}
            </div>
            {{ end_form() }}
        </fieldset>
    </div>
</div>