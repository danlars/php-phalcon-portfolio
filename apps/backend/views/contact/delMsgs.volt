{%
set sideNav = [ 'index':     'Indbakke',
                'sentMsgs':  'Sendte beskeder',
                'delMsgs':   'Slettede beskeder']
%}

<div class="row">
    <h1>Feedback</h1>

    <div class="large-3 medium-3 small-12 columns">
        <ul class="side-nav">
            {% for key,value in sideNav %}
                {% if key == router.getActionName() %}
                    <li>
                        <strong>{{ link_to('admin/contact/' ~ key, value) }}</strong>
                    </li>
                {% else %}
                    <li>{{ link_to('admin/contact/' ~ key, value) }}</li>
                {% endif %}
            {% endfor %}
        </ul>
    </div>

    <div class="large-9 medium-9 small-12 columns">

        {% for item in contacts %}
            <hr/>
            <div class="large-12 medium-12 small-12 columns">

                <h4 class="linkTxt" title="{{ item.email }}" >
                    {% if item.status == 'N' %}
                        <strong data="{{ item.id }}" class="notRead">
                            {{ item.fullname }}
                            <span class="right">{{ item.dato }}</span>
                        </strong>
                    {% else %}
                        {{ item.fullname }}
                        <span class="right">{{ item.dato }}</span>
                    {% endif %}
                </h4>

                <span class="hideTxt">
                    <div class="large-12 medium-12 small-12 columns">
                        <h5 class="subheader">
                            {{ item.title }}
                        </h5>
                        {{ item.txt }}
                    </div>
                </span>
            </div>

        {% endfor %}
    </div>
</div>