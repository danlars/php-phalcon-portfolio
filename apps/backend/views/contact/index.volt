{%
    set sideNav = [ 'index':    'Indbakke',
                    'sentMsgs':     'Sendte beskeder',
                    'delMsgs':   'Slettede beskeder']
%}
{{ form('admin/contact/MoveToDelete', 'method': 'post') }}
    <div class="row">
        <div class="large-3 medium-3 columns">
            <h1>Feedback</h1>
        </div>
        <div style="margin-top:45px;" class="large-9 medium-9 small-12 columns">
            {{ submit_button('Slet', 'class' : 'btnLink') }}
        </div>
    </div>
    <div class="row">
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
                        <div class="large-1 medium-1 small-1 columns">
                            {{ check_field('check[]', 'value' : item.id, 'class' : 'pushChckBtn') }}
                        </div>
                        <div class="large-11 medium-11 small-11 columns">
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
                        </div>
                        <span class="hider">
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
{{ end_form() }}