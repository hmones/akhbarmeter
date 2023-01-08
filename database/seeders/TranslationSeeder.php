<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        Translation::insert([
            $this->getTranslationRecord('navigation.top.advertisement.text', 'All', 'Advertisement', 'اعلانات'),
            $this->getTranslationRecord('navigation.top.advertisement.link', 'All', '#'),
            $this->getTranslationRecord('navigation.top.partnership.text', 'All', 'Partnership', 'شراكة'),
            $this->getTranslationRecord('navigation.top.partnership.link', 'All', 'mailto:info@akhbarmeter.org'),
            $this->getTranslationRecord('navigation.top.contact.text', 'All', 'Contact us', 'تواصل معنا'),
            $this->getTranslationRecord('navigation.top.contact.link', 'All', '/contact'),

            $this->getTranslationRecord('navigation.main.menu.home.text', 'All', 'Home', "الرئيسية"),
            $this->getTranslationRecord('navigation.main.menu.home.link', 'All', '/'),
            $this->getTranslationRecord('navigation.main.menu.about.text', 'All', 'About', 'من نحن؟'),
            $this->getTranslationRecord('navigation.main.menu.about.link', 'All', '/about'),
            $this->getTranslationRecord('navigation.main.menu.methodology.text', 'All', 'How it works?', 'المنهجية'),
            $this->getTranslationRecord('navigation.main.menu.methodology.link', 'All', '/methodology'),
            $this->getTranslationRecord('navigation.main.menu.publishers.text', 'All', 'Ranking', 'الجرائد'),
            $this->getTranslationRecord('navigation.main.menu.publishers.link', 'All', '/publishers'),
            $this->getTranslationRecord('navigation.main.menu.news.text', 'All', 'News', 'الأخبار'),
            $this->getTranslationRecord('navigation.main.menu.news.link', 'All', '/articles'),
            $this->getTranslationRecord('navigation.main.menu.academy.text', 'All', 'Academy', 'التدريبات'),
            $this->getTranslationRecord('navigation.main.menu.academy.link', 'All', '/topics'),
            $this->getTranslationRecord('navigation.main.login.text', 'All', 'Login', 'الدخول'),
            $this->getTranslationRecord('navigation.main.welcome.text', 'All', 'Welcome', 'أهلا'),

            $this->getTranslationRecord('footer.menu.partners.text', 'All', 'Partners', 'الشركاء'),
            $this->getTranslationRecord('footer.menu.partners.link', 'All', '/about#partners'),
            $this->getTranslationRecord('footer.menu.press.text', 'All', 'Press', 'الإعلام'),
            $this->getTranslationRecord('footer.menu.press.link', 'All', 'mailto:info@akhbarmeter.org'),
            $this->getTranslationRecord('footer.menu.jobs.text', 'All', 'Jobs', 'الوظائف'),
            $this->getTranslationRecord('footer.menu.jobs.link', 'All', 'mailto:info@akhbarmeter.org'),
            $this->getTranslationRecord('footer.menu.blog.text', 'All', 'Blog', 'الموضوعات'),
            $this->getTranslationRecord('footer.menu.blog.link', 'All', '/topics'),
            $this->getTranslationRecord('footer.menu.about.text', 'All', 'About', 'من نحن؟'),
            $this->getTranslationRecord('footer.menu.about.link', 'All', '/about'),
            $this->getTranslationRecord('footer.copyrights', 'All', 'AkhbarMeter. All Rights Reserved', 'أخبارميتر. جميع الحقوق محفوظة'),

            $this->getTranslationRecord('pages.home.top-section.ranking.header', 'Home', 'Top ranking', 'أفضل الجرائد'),
            $this->getTranslationRecord('pages.home.top-section.fake.header', 'Home', 'Top fake news!', 'أبرز الأخبار الزائفة'),
            $this->getTranslationRecord('pages.home.top-section.about-akhbarmeter', 'Home', 'The first digital online media observatory in Egypt and the Middle East that ranks digital media channels according to their adherence to ethical and professional standards in media production. The observatory also offers training for journalists and individuals interested in media ethics. ', 'أول مرصد إعلامي رقمي على الإنترنت في مصر والشرق الأوسط يصنف قنوات الوسائط الرقمية وفقًا لالتزامها بالمعايير الأخلاقية والمهنية في الإنتاج الإعلامي. كما يقدم المرصد تدريبا للصحفيين الأفراد والمهتمين بأخلاقيات الإعلام.'),
            $this->getTranslationRecord('pages.home.top-section.search.header', 'Home', 'Search news ...', 'ابحث في الأخبار'),
            $this->getTranslationRecord('pages.home.top-section.search.placeholder', 'Home', 'What are you looking for?', 'ماذا تبحث عن؟'),
            $this->getTranslationRecord('pages.home.top-section.search.button', 'Home', 'Search', 'بحث'),
            $this->getTranslationRecord('pages.home.top-section.scroll', 'Home', 'Scroll down', 'إذهب للأسفل'),
            $this->getTranslationRecord('pages.home.top-section.latest', 'Home', 'Latest News:', 'آخر الأخبار:'),

            $this->getTranslationRecord('components.home.rank.best', 'Home', 'Best last month', 'الأفضل الشهر الماشي'),
            $this->getTranslationRecord('components.home.rank.worst', 'Home', 'Worst last month', 'الأسوأ الشهر الماضي '),
            $this->getTranslationRecord('components.home.rank.hint', 'Home', 'Accuracy rank', 'نسبة التقييم'),
            $this->getTranslationRecord('components.home.rank.number', 'Home', 'No.', 'رقم'),

            $this->getTranslationRecord('pages.home.ranking.header', 'Home', 'This month ranking', 'التقييم هذا الشهر'),
            $this->getTranslationRecord('pages.home.ranking.description', 'Home', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.'),

            $this->getTranslationRecord('pages.home.news.header', 'Home', 'Latest news'),
            $this->getTranslationRecord('pages.home.news.description', 'Home', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.'),

            $this->getTranslationRecord('components.cards.article.rating.header', 'News', 'Rating and Reviews', 'النسبة والتقييم'),
            $this->getTranslationRecord('components.cards.article.rating.link', 'News', 'See full review', 'شاهد التقييم'),
            $this->getTranslationRecord('components.cards.article.rating.overall', 'News', 'Article Overall Rating', 'التقييم الكلي'),
            $this->getTranslationRecord('general.human-rights', 'All', 'Human Rights', 'حقوق الإنسان'),
            $this->getTranslationRecord('general.credibility', 'All', 'Credibility', 'المصداقية'),
            $this->getTranslationRecord('general.professionalism', 'All', 'Professionalism', 'الاحترافية'),
            $this->getTranslationRecord('general.view-all', 'Home', 'View all', 'المزيد'),
            $this->getTranslationRecord('general.learn-more', 'All', 'Learn more', 'المزيد'),

            $this->getTranslationRecord('pages.home.check.header', 'Home', 'Your source of truth always!', 'مصدرك الدائم للحقيقة'),
            $this->getTranslationRecord('pages.home.check.description', 'Home', 'Check your news via our rating engine, and make sure that you read what’s true!', 'تحقق من أخبارك عبر محرك التصنيف الخاص بنا ، وتأكد من قراءة ما هو صحيح!'),
            $this->getTranslationRecord('pages.home.check.placeholder', 'Home', 'Paste news link here ...', 'الصق رابط الخبر هنا ...'),
            $this->getTranslationRecord('pages.home.check.button', 'Home', 'Check it\'s accuracy now', 'تأكد من صحة الخبر الآن'),
            $this->getTranslationRecord('pages.home.check.thanks', 'Home', 'Thank you', 'شكرا'),
            $this->getTranslationRecord('pages.home.check.error', 'Home', '* The link has to be the full and accessible link to the article: e.g. https://edition.cnn.com/', '* يجب أن يكون الرابط هو الرابط الكامل والذي يمكن الوصول إليه للمقالة: على سبيل المثال https://edition.cnn.com/ '),

            $this->getTranslationRecord('pages.home.fake.header', 'Home', 'Fake news!', 'الأخبار الزائفة'),
            $this->getTranslationRecord('pages.home.fake.description', 'Home', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),

            $this->getTranslationRecord('pages.home.video.header', 'Home', 'The weekly summary ...', 'الفيديو الأسبوعي ...'),
            $this->getTranslationRecord('pages.home.video.description', 'Home', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),

            $this->getTranslationRecord('pages.topics.header', 'Topics', 'Topics', 'التدريبات'),
            $this->getTranslationRecord('pages.topics.description', 'Topics', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),
            $this->getTranslationRecord('pages.topics.violations', 'Topics', 'Violations', 'انتهاكات'),
            $this->getTranslationRecord('pages.topics.codeOfEthics', 'Topics', 'Code of Ethics', 'المهنية الإعلامية'),
            $this->getTranslationRecord('pages.topics.fakeNews', 'Topics', 'Fake News', 'أخبار زائفة'),

            $this->getTranslationRecord('pages.topic.mins', 'Topic', 'min read', 'دقائق للقراءة'),
            $this->getTranslationRecord('pages.topic.author', 'Topic', 'Article Author', 'كتابة'),
            $this->getTranslationRecord('pages.topic.category', 'Topic', 'Category', 'التصنيف'),
            $this->getTranslationRecord('pages.topic.related.header', 'Topic', 'Related topics', 'مواضيع مرتبطة'),
            $this->getTranslationRecord('pages.topic.related.description', 'Topic', 'Topics that are related to this one', 'مواضيع لها علاقة بهذا الموضوع'),


            $this->getTranslationRecord('pages.home.insights.header', 'Home', 'Insights & Partners', 'أخبارميتر في أرقام'),
            $this->getTranslationRecord('pages.home.insights.description', 'Home', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),
            $this->getTranslationRecord('pages.home.insights.publishers', 'Home', 'Publishers', 'الجرائد'),
            $this->getTranslationRecord('pages.home.insights.topics', 'Home', 'Topics', 'التدريبات'),
            $this->getTranslationRecord('pages.home.insights.review', 'Home', 'Review', 'تقييمات'),
            $this->getTranslationRecord('pages.home.insights.employees', 'Home', 'Reviewers', 'المقيمين'),

            $this->getTranslationRecord('pages.home.publications.header', 'Publications', 'Publications', 'الإصدارات'),
            $this->getTranslationRecord('pages.home.publications.description', 'Publications', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),

            $this->getTranslationRecord('pages.home.testimonials.1.text', 'Home', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.'),
            $this->getTranslationRecord('pages.home.testimonials.1.name', 'Home', 'Judith Black'),
            $this->getTranslationRecord('pages.home.testimonials.1.position', 'Home', 'CEO, Tuple'),
            $this->getTranslationRecord('pages.home.testimonials.2.text', 'Home', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.'),
            $this->getTranslationRecord('pages.home.testimonials.2.name', 'Home', 'Joseph Rodriguezk'),
            $this->getTranslationRecord('pages.home.testimonials.2.position', 'Home', 'CEO, Workcation'),

            $this->getTranslationRecord('pages.home.download.header', 'Home', 'Ready to dive in?', 'مستعد لمعرفة المزيد؟'),
            $this->getTranslationRecord('pages.home.download.description', 'Home', 'Download our news report today.', 'تصفح أخر تقارير أخبارميتر'),
            $this->getTranslationRecord('pages.home.download.button', 'Home', 'Download now', 'حمل الآن'),
            $this->getTranslationRecord('pages.home.download.link', 'Home', '#'),

            $this->getTranslationRecord('component.newsletter.header', 'All', 'Want accurate news and updates?', 'هل تريد أخبار وتحديثات دقيقة؟'),
            $this->getTranslationRecord('component.newsletter.description', 'All', 'Sign up for our newsletter to stay up on top of everyday news. ', 'اشترك في النشرة الإخبارية لدينا للبقاء على اطلاع على الأخبار اليومية.'),
            $this->getTranslationRecord('component.newsletter.button', 'All', 'Notify me'),
            $this->getTranslationRecord('component.newsletter.hint', 'All', 'We care about the protection of your data. Read our ', 'نحن نهتم بحماية بياناتك. اقرأ'),
            $this->getTranslationRecord('component.newsletter.privacy', 'All', 'Privacy Policy', 'سياسة الخصوصية'),

            $this->getTranslationRecord('pages.articles.header', 'Article', 'Search out Reviews', 'ابحث عن تقييم'),
            $this->getTranslationRecord('pages.articles.search.button', 'Article', 'Advanced search', 'بحث متقدم'),
            $this->getTranslationRecord('pages.article.category', 'Article', 'Category', 'التصنيف'),
            $this->getTranslationRecord('pages.article.reviewed', 'Article', 'Reviewed by', 'تم التقييم بواسطة'),
            $this->getTranslationRecord('pages.article.author', 'Article', 'Article Author', 'الصحفي'),
            $this->getTranslationRecord('pages.article.comment.reviewer', 'Article', 'Reviewer\'s Comment', 'تعليق المقيم'),
            $this->getTranslationRecord('pages.article.comment.journalist', 'Article', 'Journalist\'s Comment', 'تعليق الصحفي'),
            $this->getTranslationRecord('pages.article.details.header', 'Article', 'Our detailed review', 'التقييم المفصل'),
            $this->getTranslationRecord('pages.article.details.nothing', 'Article', 'No questions found in this category', 'لا يوجد تقييمات في هذا التصنيف'),
            $this->getTranslationRecord('pages.article.side.header', 'Article', 'Resource Links', 'عن الخبر'),
            $this->getTranslationRecord('pages.article.side.description', 'Article', 'The article was copied from', 'تم نقل النص من '),
            $this->getTranslationRecord('pages.article.side.link', 'Article', 'View original article', 'تصفح اصل الخبر'),

            $this->getTranslationRecord('pages.videos.header', 'Videos', 'Videos', 'الفيديو'),
            $this->getTranslationRecord('pages.videos.description', 'Videos', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed. '),

            $this->getTranslationRecord('pages.video.header', 'Video', 'Video', 'الفيديو'),

            $this->getTranslationRecord('pages.news.header', 'News', 'News Outlets', 'الجرائد'),
            $this->getTranslationRecord('pages.news.description', 'News', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed'),

            $this->getTranslationRecord('components.publisher.card.rank', 'All', 'Rank: No.', 'الترتيب: رقم'),
            $this->getTranslationRecord('components.publisher.card.month', 'All', 'Last month Rating:', 'تقيييم الشهر السابق:'),
            $this->getTranslationRecord('components.publisher.card.week', 'All', 'Last week Rating:', 'تقيييم الأسبوع السابق:'),

            $this->getTranslationRecord('pages.publisher.average', 'Publisher', 'Average rate', 'متوسط التقييم'),
            $this->getTranslationRecord('pages.publisher.header', 'Publisher', 'Latest Reviews from ', 'أخر التقييمات من '),
            $this->getTranslationRecord('pages.publisher.description', 'Publisher', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.'),

            $this->getTranslationRecord('pages.contact.header', 'Contact', 'Contact us', 'تواصل معنا'),
            $this->getTranslationRecord('pages.contact.description', 'Contact', 'Simple text saying what the user should excpect by clicking on any of the news outlets'),
            $this->getTranslationRecord('pages.contact.information.header', 'Contact', 'Contact information', 'بيانات التواصل'),
            $this->getTranslationRecord('pages.contact.information.description', 'Contact', 'Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu'),
            $this->getTranslationRecord('pages.contact.form.header', 'Contact', 'Send us a message', 'راسلنا'),
            $this->getTranslationRecord('pages.contact.form.limit', 'Contact', 'Max. 500 characters', 'الحد الأقصى 500 حرف'),

            $this->getTranslationRecord('pages.contact.form.firstName', 'Contact', 'First name', 'الأسم الأول'),
            $this->getTranslationRecord('pages.contact.form.secondName', 'Contact', 'Second name', 'الاسم الثاني'),
            $this->getTranslationRecord('pages.contact.form.email', 'Contact', 'Email', 'البريد الإلكتروني'),
            $this->getTranslationRecord('pages.contact.form.phone', 'Contact', 'Phone Number', 'الهاتف'),
            $this->getTranslationRecord('pages.contact.form.subject', 'Contact', 'Subject', 'الموضوع'),
            $this->getTranslationRecord('pages.contact.form.message', 'Contact', 'Message', 'الرسالة'),
            $this->getTranslationRecord('pages.contact.form.button', 'Contact', 'Send', 'ارسل'),

            $this->getTranslationRecord('components.support.header', 'All', 'Support the project now!', 'ادعم المشروع الآن'),
            $this->getTranslationRecord('components.support.description', 'All', 'We need your help to stay independent and to produce more videos and learning materials that would benefit journalists and media consumers. Our project cannot continue without your support. We would appreciate every cent you pay because this could help us become sustainable'),
            $this->getTranslationRecord('components.support.button', 'All', 'Become partner', 'كن شريك'),

            $this->getTranslationRecord('pages.about.header', 'About', 'Who we are', 'من نحن'),
            $this->getTranslationRecord('pages.about.description', 'About', 'This text can be a short text that would explain what the brand will be like and how to show people who we are but without any explansions. '),
            $this->getTranslationRecord('pages.about.mediameter.header', 'About', 'Media Meter', 'أخبار ميتر'),
            $this->getTranslationRecord('pages.about.mediameter.description', 'About', 'AkhbarMeter (MediaMeter) is one of the first dynamic digital media observatories in Egypt and...', 'يعد أخبارميتر أول مرصد ديناميكي أونلاين للوسائط الرقمية في مصر ...'),
            $this->getTranslationRecord('pages.about.methodology.header', 'About', 'How it works?', 'المنهجية'),
            $this->getTranslationRecord('pages.about.methodology.description', 'About', 'The team evaluate news articles by answering a series of questions (19 questions) that are available ...', 'يقوم الفريق بتقييم المقالات الإخبارية من خلال الإجابة على سلسلة من الأسئلة (19 سؤالاً) المتوفرة ...'),
            $this->getTranslationRecord('pages.about.partners', 'About', 'Our Partners', 'شركاؤنا'),
            $this->getTranslationRecord('pages.about.contact', 'About', 'Contact Us', 'تواصل معنا'),

            $this->getTranslationRecord('pages.akhbarmeter.header', 'AkhbarMeter', 'Who we are?', 'من نحن?'),
            $this->getTranslationRecord('pages.akhbarmeter.description', 'AkhbarMeter', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque '),
            $this->getTranslationRecord('pages.akhbarmeter.history.header', 'AkhbarMeter', 'Our History', 'تاريخنا'),
            $this->getTranslationRecord('pages.akhbarmeter.history.description', 'AkhbarMeter', 'khbarMeter (MediaMeter) is one of the first dynamic digital media observatories in Egypt and the
                    world, which rank news agencies according to their adherence to ethical and processional media
                    standards. AkhbarMeter, is a youth-led initiative developed by Egyptians. The initiative started on
                    a voluntary basis in 2014 and officially in 2018. It is an attempt to response to increasing use of
                    media to manipulate the public and polarize society.', 'أخبارميتر هو واحد من أولى مراصد الوسائط الرقمية الديناميكية في مصر و
                     العالم ، الذي يصنف وكالات الأنباء وفقًا لالتزامها بالإعلام الأخلاقي والتنفيذي
                     المعايير. أخبار متر ، هي مبادرة يقودها الشباب طورها المصريون. بدأت المبادرة
                     على أساس تطوعي في عام 2014 ورسميًا في عام 2018. إنها محاولة للرد على الاستخدام المتزايد لـ
                     وسائل الإعلام للتلاعب بالجمهور واستقطاب المجتمع.'),
            $this->getTranslationRecord('pages.akhbarmeter.monitor.header', 'AkhbarMeter', 'We monitor', 'نرصد'),
            $this->getTranslationRecord('pages.akhbarmeter.monitor.description', 'AkhbarMeter', 'khbarMeter (MediaMeter) monitors and assesses the truthfulness and professionalism of the top ten
                    online news websites in Egypt based on Similar Web rankings. Our reviewers select and evaluate
                    articles from the political or economic sections of each news outlet based on their importance to
                    the Egyptian readers. Reviewers assess each article based on several methodological questions
                    developed in consultation with various international fact-checking experts that fall under three
                    broad categories of professionalism, manipulation and human rights violations.', 'أخبارميتر يراقب ويقيم مصداقية واحتراف المراكز العشرة الأولى
                     مواقع الأخبار على الإنترنت في مصر بناءً على تصنيفات الويب المماثلة. المراجعين لدينا يختارون ويقيمون
                     مقالات من الأقسام السياسية أو الاقتصادية لكل منفذ إخباري بناءً على أهميتها في
                     القراء المصريين. يقوم المراجعون بتقييم كل مقال بناءً على عدة أسئلة منهجية
                     تم تطويره بالتشاور مع العديد من خبراء التحقق من الحقائق الدوليين الذين يقعون تحت ثلاثة
                     فئات واسعة من المهنية والتلاعب وانتهاكات حقوق الإنسان.'),
            $this->getTranslationRecord('pages.akhbarmeter.review.header', 'AkhbarMeter', 'We review', 'نقييم'),
            $this->getTranslationRecord('pages.akhbarmeter.review.description', 'AkhbarMeter', 'Specific questions include whether the article conceals information, contains false information,
                    uses photos to manipulate facts, cites sources representing different views, reflects bias by the
                    author, contains hate speech, negatively profiles members of certain groups, and more. Assessed
                    articles are posted on the website (https://akhbarmeter.org/) along with responses to the questions
                    described above. Each reviewed article is marked with an icon that provides a score out of 100% on
                    how professional and truthful it is. If the article contains false or misinformation, the icon is
                    marked accordingly to warn reader s. Our staff often contact authors of reviewed articles to give
                    them a chance to respond to the evaluation and offer to publish their responses on the article’s
                    page on the website.', 'تتضمن الأسئلة المحددة ما إذا كانت المقالة تخفي معلومات أو تحتوي على معلومات خاطئة أو
                     يستخدم الصور للتلاعب بالحقائق ، ويستشهد بمصادر تمثل وجهات نظر مختلفة ، ويعكس التحيز من قبل
                     المؤلف ، يحتوي على كلام يحض على الكراهية ، وملفات تعريف سلبية لأعضاء مجموعات معينة ، والمزيد. تقييم
                     المقالات المنشورة على الموقع (https://akhbarmeter.org/) مع الردود على الأسئلة
                     موصوف بالاعلى. يتم تمييز كل مقالة تمت مراجعتها بأيقونة توفر درجة من 100٪ في
                     ما مدى المهنية والصدق. إذا كانت المقالة تحتوي على معلومات خاطئة أو خاطئة ، فالأيقونة هي
                     وفقًا لذلك لتحذير القراء. غالبًا ما يتصل موظفونا بمؤلفي المقالات التي تمت مراجعتها لتقديمها
                     لهم فرصة للرد على التقييم وعرض نشر ردودهم على المقالات
                     صفحة على الموقع.'),
            $this->getTranslationRecord('pages.akhbarmeter.assess.header', 'AkhbarMeter', 'We assess', 'نحلل'),
            $this->getTranslationRecord('pages.akhbarmeter.assess.description', 'AkhbarMeter', 'In addition to daily article reviews, AkhbarMeter (MediaMeter) conducts a monthly analysis of each
                    media outlet performance based on the cumulative articles reviewed and a monthly score for each
                    media outlet will be generated automatically. Finally, we publish three one-page articles per month
                    with deeper analysis on critical news items. The assessments are also circulated through its social
                    media networks for a wide range of audience.', 'بالإضافة إلى المراجعات اليومية للمقالات ، تجري أخبارميتر تحليلاً شهريًا لكل منها
                     يعتمد أداء منفذ الوسائط على المقالات التراكمية التي تمت مراجعتها والنتيجة الشهرية لكل منها
                     سيتم إنشاء منفذ الوسائط تلقائيًا. أخيرًا ، ننشر ثلاث مقالات من صفحة واحدة شهريًا
                     مع تحليل أعمق لعناصر الأخبار الهامة. التقييمات كما يتم تعميمها من خلال وسائل التواصل الاجتماعي
                     شبكات وسائط لمجموعة واسعة من الجماهير.'),
            $this->getTranslationRecord('pages.akhbarmeter.awards', 'AkhbarMeter', 'Awards Received', 'الجوائز'),
            $this->getTranslationRecord('pages.akhbarmeter.partners', 'AkhbarMeter', 'Partners', 'الشركاء'),
            $this->getTranslationRecord('pages.akhbarmeter.featured', 'AkhbarMeter', 'Featured In', 'تحدثوا عنا'),

            $this->getTranslationRecord('pages.methodology.title', 'Methodology', 'Methodology (How it works?)', 'المنهجية'),
            $this->getTranslationRecord('pages.methodology.header', 'Methodology', 'How it works?', 'المنهجية'),
            $this->getTranslationRecord('pages.methodology.description', 'Methodology', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque'),
            $this->getTranslationRecord('pages.methodology.top.header1', 'Methodology', 'How do we evaluate articles and news papers?', 'كيف نقيم المقالات والصحف؟'),
            $this->getTranslationRecord('pages.methodology.top.header2', 'Methodology', 'Download our news report today.', 'قم بتنزيل تقريرنا الإخباري اليوم.'),
            $this->getTranslationRecord('pages.methodology.top.description', 'Methodology', 'Below you can download AkhbarMeter\'s handbook for reviewing news articles. The handbook illustrates
                    the methodology in full details with examples that helps to understand each question and its answers', 'أدناه يمكنك تحميل كتيب أخبارميتر لمراجعة المقالات الإخبارية. يوضح الكتيب
                     المنهجية بتفاصيلها الكاملة مع أمثلة تساعد على فهم كل سؤال وإجاباته'),
            $this->getTranslationRecord('pages.methodology.top.button', 'Methodology', 'Download', 'حمل'),
            $this->getTranslationRecord('pages.methodology.faq.header', 'Methodology', 'Frequently asked questions', 'أسئلة شائعة'),
            $this->getTranslationRecord('pages.methodology.faq.description', 'Methodology', 'Can’t find the answer you’re looking for? Reach out to our <a href="#" class="text-blue-600">customer
                        support</a> team.', 'لا يمكنك العثور على الإجابة التي تبحث عنها؟ تواصل مع <a href="#" class="text-blue-600">
                         فريق الدعم </a>.'),
            $this->getTranslationRecord('pages.methodology.how.header', 'Methodology', 'How are articles rated on AkhbarMeter', 'كيف يتم تصنيف المقالات على موقع أخبارميتر'),
            $this->getTranslationRecord('pages.methodology.how.description', 'Methodology', 'The team evaluate news articles by answering a series of questions (19 questions) that are available
                    here. These questions are derived from international and local media code of ethics and professional
                    standards . The questions are categorized into three sections, the first section is concerned with
                    violations of law conduct and human rights. The second section is concerned with manipulation
                    techniques
                    used by media channels, whereas the third section is concerned with professionalism in news
                    reporting
                    and content writing.', 'يقوم الفريق بتقييم المقالات الإخبارية من خلال الإجابة على سلسلة من الأسئلة (19 سؤالاً) المتوفرة
                     هنا. هذه الأسئلة مستمدة من مدونة الأخلاق والمهنية الإعلامية الدولية والمحلية
                     اساسي . يتم تصنيف الأسئلة إلى ثلاثة أقسام ، ويختص القسم الأول بها
                     انتهاكات القانون والسلوك وحقوق الإنسان. القسم الثاني معني بالتلاعب
                     التقنيات
                     تستخدم من قبل القنوات الإعلامية ، في حين أن القسم الثالث يختص بالاحتراف في الأخبار
                     التقارير
                     وكتابة المحتوى.'),
            $this->getTranslationRecord('pages.methodology.explain.header', 'Methodology', 'What does the rating percentage refer to?', 'إلى ماذا تشير نسبة التصنيف؟'),
            $this->getTranslationRecord('pages.methodology.explain.description', 'Methodology', 'All rated articles get a score from 0 to 100%. This score reflects the degree to which the news
                    article
                    aligns with professional standards and code of ethics. The score is calculated automatically after
                    each
                    article is rated by one of our reviewers.', 'تحصل جميع المقالات المصنفة على درجة من 0 إلى 100٪. تعكس هذه النتيجة الدرجة التي وصلت إليها الأخبار
                     مقالة - سلعة
                     يتوافق مع المعايير المهنية وقواعد الأخلاق. يتم احتساب النتيجة تلقائيًا بعد ذلك
                     كل
                     مقال تم تقييمه من قبل أحد المراجعين لدينا.'),
            $this->getTranslationRecord('pages.methodology.category.header', 'Methodology', 'Do all criteria have the same influence on the final rating score?', 'هل جميع المعايير لها نفس التأثير على درجة التقييم النهائية؟'),
            $this->getTranslationRecord('pages.methodology.category.description', 'Methodology', 'The three different categories of questions (professionalism, violations of law conduct and human rights, and manipulation) do not equally influence the public.', 'لا تؤثر الفئات الثلاث المختلفة من الأسئلة (الاحتراف ، وانتهاكات السلوك القانوني وحقوق الإنسان ، والتلاعب) على الجمهور بشكل متساوٍ.'),
            $this->getTranslationRecord('pages.methodology.professionalism', 'Methodology', 'The extent to which the question damages public opinion determines its weight in the score.', 'يحدد مدى الضرر الذي يلحقه السؤال بالرأي العام وزنه في النتيجة.'),
            $this->getTranslationRecord('pages.methodology.credibility', 'Methodology', 'The questions in the category of legal and human rights violations have the highest weight among all the
                questions, and then come the questions related to manipulation and propaganda', 'الأسئلة في فئة الانتهاكات القانونية وحقوق الإنسان لها الوزن الأكبر بين الجميع
                 الأسئلة ، ثم تأتي الأسئلة المتعلقة بالتلاعب والدعاية'),
            $this->getTranslationRecord('pages.methodology.human-rights', 'Methodology', 'finally the questions of professionalism and code of ethics, which AkhbarMeter team is keen on
                promoting.', 'وأخيراً أسئلة الاحتراف وقواعد السلوك التي يحرص عليها فريق أخبار متر
                 تعزيز.'),
            $this->getTranslationRecord('pages.methodology.questions.header', 'Methodology', 'What are the questions that we base our rating on?', 'ما هي الأسئلة التي نبني عليها تقييمنا؟'),
            $this->getTranslationRecord('pages.methodology.disclaimer.header', 'Methodology', 'Disclaimer', 'ملحوظة'),
            $this->getTranslationRecord('pages.methodology.disclaimer.description', 'Methodology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui arcu sodales ullamcorper mauris eget eleifend
            proin semper odio. Convallis sit imperdiet egestas at sed duis donec at amet. Orci sed non diam, vel, enim
            convallis magna. Orci mattis orci dictum varius. Semper luctus risus platea feugiat lobortis blandit enim at
            sit. Vitae consectetur pharetra leo, ut sed potenti lectus sagittis, dignissim.
            Vulputate elit massa pellentesque eu id commodo ipsum. Cursus tellus sit suspendisse arcu vel viverra. Dolor
            integer cum dolor pellentesque elementum quisque. Ac ultrices sed velit ac lacus vulputate dictum. Nulla
            felis quam tempor purus id. Mi nam ornare ultricies fermentum tristique mi. Id arcu mauris egestas viverra
            sed. Auctor pretium fermentum nam sed platea.    '),]);
        cache()->forget('translations');
    }

    protected function getTranslationRecord(string $key, string $page, string $en, $ar = null): array
    {
        return ['key'        => $key, 'content' => $this->getTranslationString($en, $ar ?: $en), 'page' => $page,
                'created_at' => now(),];
    }

    protected function getTranslationString(string $en, string $ar): string
    {
        return json_encode(compact(['en', 'ar']));
    }
}
