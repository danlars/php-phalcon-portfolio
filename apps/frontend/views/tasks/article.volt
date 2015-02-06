<div class="row">
    <div class="large-12 columns">
        <div id="taskLinks" class="right">
            {% for titlePage in newsTitle %}
                {{ link_to('tasks/index/' ~ titlePage.titleID, titlePage.title) }}
            {% endfor %}
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <h1>{{ newsArticle.title }}</h1>
        </div>
        <div class="large-12 medium-12 small-12 columns">
            <div class="right large-5 medium-5 small-12">
                <ul class="small-block-grid-1">
                    <li>
                        {{ image("img/" ~ newsArticle.img, "alt": newsArticle.title, "class": "th") }}
                    </li>
                </ul>
            </div>
            {{ newsArticle.txt }}
        </div>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <hr/>
        <ul class="small-block-grid-4">
            {% for item in articles %}
            <li>
                {{ link_to( 'tasks/article/' ~ item.newsID, image("img/" ~ item.img, "alt": item.title, "class": "th")) }}
            </li>
            {% endfor %}
        </ul>
    </div>
</div>