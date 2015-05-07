
<div class="row">

    <dl class="sub-nav"> <dt>Kategorier:</dt>
        <dd {% if pageID == 0 %} class="active" {% endif %} >{{ link_to('tasks/index/', "Alle") }}</dd>

        {% for titlePage in newsTitle %}
            <dd {% if titlePage.titleID == pageID %} class="active" {% endif %} >
                {{ link_to('tasks/index/' ~ titlePage.titleID, titlePage.title) }}
            </dd>
        {% endfor %}

    </dl>
</div>

{% for item in page.items %}

    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <hr>
        </div>

        <div class="large-8 {% if loop.index%2 == 0 %}right{% endif %} columns">
            <h4>{{ item.title }}</h4>
            <p>
                {{ item.txt }}
                {{ link_to('tasks/article/' ~ item.pageID,'Læs mere') }}
            </p>
        </div>

        <div class="large-4 columns">
            {{ image("img/" ~ item.img, "alt": item.title) }}
        </div>
    </div>
{% endfor %}
<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <hr/>
        <ul class="pagination">
            <li class="arrow {% if page.current <= 1 %}unavailable {% endif %}">
                {{ link_to('tasks/index/' ~ pageID ~ '?page=' ~ page.before, '&laquo') }}
            </li>
            {% for i in 1..page.total_pages %}
            <li {% if page.current == i %} class="current" {% endif %}>
                {{ link_to('tasks/index/' ~ pageID ~ '?page=' ~ i, i) }}
            </li>
            {% endfor %}

            <li class="arrow {% if page.current == page.total_pages %}unavailable {% endif %}">
                {{ link_to('tasks/index/' ~ pageID ~ '?page=' ~ page.next, '&raquo') }}
            </li>
        </ul>
    </div>
</div>