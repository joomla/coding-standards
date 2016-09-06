;(function($) {
    var populateWindow = function(link) {
        var markdownRequest = new Request({
            "url": here + 'manual/' + locale + '/' + link,
            "method": "get",
            "onSuccess": function(response) {
                $('docwin').set('html', marked(response));
            }
        }).send();

        $$('.nav-list li').each(
            function(item) {
                if (item.getElements('a').length == 0) {
                    item.addClass('nav-header');
                }
            }
        );

        $$('.nav-list a').each(
            function(item, index)
            {
                if (link == item.get('href'))
                {
                    item.getParent('li').addClass('active');
                }
                else
                {
                    item.getParent('li').removeClass('active');
                }
            }.bind(this)
        );
    }

    var populateMenu = function() {
        var markdownRequest = new Request({
            "url": here + 'manual/' + locale + '/menu.md',
            "method": "get",
            "onSuccess": function (response) {
                $('doc-menu').set('html', marked(response));
                $$('#doc-menu ul').each(function(el) {
                    el.addClass('nav');
                    el.addClass('nav-list');
                });

                $$('.nav-list li').each(
                    function(item) {
                        if (item.getElements('a').length == 0) {
                            item.addClass('nav-header');
                        }
                    }
                );
            }
        }).send();
    }

    var populateLanguage = function() {
        var markdownRequest = new Request({
            "url": here + 'manual/' + locale + '/language.md',
            "method": "get",
            "onSuccess": function (response) {
                var parser = new DOMParser(),
                    list = parser.parseFromString(marked(response), 'text/xml');

                $$(list.getElementsByTagName('li')).each(
                    function(item) {
                        $('language-items').grab(item);
                    });
            }
        }).send();
    }

    var populateVersion = function() {
        var versionRequest = new Request({
            "url": here + 'manual/' + locale + '/version.md',
            "method": "get",
            "onSuccess": function(response) {
                $('version').set('html', marked(response));
            }
        }).send();
    }

    window.addEvent('domready', function() {
        var urlParts = document.URL.split('?', 2);
        state = {};
        here = urlParts[0];
        locale = 'en-US';

        if (urlParts.length > 1)
        {
            var currentDoc = urlParts[1];
        }
        else
        {
            var currentDoc = "coding-standards/introduction.md";
        }

        marked.setOptions({
            gfm: true,
            pedantic: false,
            sanitize: false,
            highlight: function(code, lang) {
                var that;
                Rainbow.color(code, lang, function(hl_code) { that = hl_code; });
                return that;
            }
        })
        populateMenu();
        populateLanguage();
        populateWindow(currentDoc);
        populateVersion();

        document.id('language-items').addEvent('click:relay(a)', function (event, target) {
            locale = target.get('href');
            populateMenu();
            populateWindow(currentDoc);
            event.preventDefault();

            // Update display text on dropdown menu
            var currentLang = target.get('html');
            $('language-select').set('html', currentLang);
        });

        document.id('main').addEvent('click:relay(a)', function (event, target) {
            if (target.get('href').substring(0, 4) != 'http' && target.get('href').substring(0, 1) != '#')
            {
                populateMenu();
                populateWindow(target.get('href'));
                event.preventDefault();
                history.pushState(state, target.get('href'), "?" + target.get('href'));
            }
        });
    });
})(document.id)
