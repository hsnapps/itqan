$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.search);
    return (results !== null) ? results[1] || 0 : false;
}

const lesson_link = `
<div class="col-sm-4 pointer" data-link="_lesson_">
    <div class="card">
        <div class="image">
            <img src="images/_image_.png" alt="place-holder" />
        </div>
        <div class="card-inner">
            <div class="header">
                <h2>_title_</h2>
                <h3>_header_</h3>
            </div>
            <div class="content">
                <p>_content_</p>
            </div>
        </div>
    </div>
</div>`;
let items = [];
const lessons = [
    'الدرس الأول',
    'الدرس الثاني',
    'الدرس الثالث',
    'الدرس الرابع',
    'الدرس الخامس',
    'الدرس السادس',
];
const headers = [
    'عنوان الدرس الأول',
    'عنوان الدرس الثاني',
    'عنوان الدرس الثالث',
    'عنوان الدرس الرابع',
    'عنوان الدرس الخامس',
    'عنوان الدرس السادس',
];
const contents = [
    'محتوى الدرس الأول',
    'محتوى الدرس الثاني',
    'محتوى الدرس الثالث',
    'محتوى الدرس الرابع',
    'محتوى الدرس الخامس',
    'محتوى الدرس السادس',
];
for (let i = 0; i < 6; ++i) {
    let html = lesson_link
        .replace('_title_', lessons[i])
        .replace('_header_', headers[i])
        .replace('_image_', `lesson_${i}`)
        .replace('_content_', contents[i])
        .replace('_lesson_', `?lesson=${i+1}`);
    items.push(html);
}
$('#content').append(items.join(''));

$('[data-link]').click(function(){
    var query = $(this).data('link');
    if (query !== '?lesson=1') {
        return;
    }
    var link = 'lesson.html' + query;
    document.location.href = link;
});

if ($.urlParam('lesson')) {
    // let lesson = $.urlParam('lesson');
    displaySection(0);
    $('[data-section]').click(function(){
        var d = $(this).data('section');
        displaySection(d);
    });
}

function displaySection(activeButton) {
    $('[data-section]').removeClass('btn-primary').addClass('btn-default');
    $('[data-show]').hide();

    $('[data-section="'+activeButton+'"]').removeClass('btn-default').addClass('btn-primary');
    $('[data-show="'+activeButton+'"]').show();
}