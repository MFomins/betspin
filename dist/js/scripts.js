jQuery(document).ready(function ($) {
    //Open search

    $('.search-icon').on('click', function () {
        $(this).css('display', 'none');
        $('.search-close').css('display', 'block');
        $('.navbar .search-form').css('display', 'flex');
    });

    $('.search-close').on('click', function () {
        $(this).css('display', 'none');
        $('.search-icon').css('display', 'block');
        $('.navbar .search-form').css('display', 'none');
    });

    //Mobile menu
    $('#nav-icon').on('click', function () {
        $('.slideout-menu').toggle();
    });

    //Submenu level 1
    $('.navbar .menu-item-has-children').on('mouseenter', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.removeClass('hide-menu');
        sub.addClass('show-menu');

        $('.sub-menu-1').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });


    $('.navbar .menu-item-has-children').on('mouseleave', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.addClass('hide-menu');
        sub.removeClass('show-menu');
    });

    //Submenu level 2
    $('.navbar .menu-item-has-children .menu-item-has-children').on('mouseenter', function () {
        var sub2 = $(this).find('.sub-menu-2');

        sub2.addClass('show-menu');

        $(this).on('mouseleave', function () {
            sub2.removeClass('show-menu');
            sub2.addClass('hide-menu');
        });

        $('.sub-menu-2').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });
    //mobile submenu
    $('.slideout-menu .menu-item-has-children i').on('click', function () {
        var sub = $(this).siblings('.sub-menu-1');
        sub.toggle();
    });

    $('.slideout-menu .menu-item-has-children .menu-item-has-children i').on('click', function () {
        var sub = $(this).siblings('.sub-menu-2');
        sub.toggle();
    });

    //Hide popup
    $(".popup-close").on('click', function () {
        $(".popup").hide();
    });
});

/*
 * Table of Contents jQuery Plugin - jquery.toc
 *
 * Copyright 2013-2016 Nikhil Dabas
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except
 * in compliance with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License
 * is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied.  See the License for the specific language governing permissions and limitations
 * under the License.
 */

(function ($) {
    "use strict";

    // Builds a list with the table of contents in the current selector.
    // options:
    //   content: where to look for headings
    //   headings: string with a comma-separated list of selectors to be used as headings, ordered
    //   by their relative hierarchy level
    var toc = function (options) {
        return this.each(function () {
            var root = $(this),
                data = root.data(),
                thisOptions,
                stack = [root], // The upside-down stack keeps track of list elements
                listTag = this.tagName,
                currentLevel = 0,
                headingSelectors;

            // Defaults: plugin parameters override data attributes, which override our defaults
            thisOptions = $.extend(
                { content: "body", headings: "h1,h2,h3" },
                { content: data.toc || undefined, headings: data.tocHeadings || undefined },
                options
            );
            headingSelectors = thisOptions.headings.split(",");

            // Set up some automatic IDs if we do not already have them
            $(thisOptions.content).find(thisOptions.headings).attr("id", function (index, attr) {
                // In HTML5, the id attribute must be at least one character long and must not
                // contain any space characters.
                //
                // We just use the HTML5 spec now because all browsers work fine with it.
                // https://mathiasbynens.be/notes/html5-id-class
                var generateUniqueId = function (text) {
                    // Generate a valid ID. Spaces are replaced with underscores. We also check if
                    // the ID already exists in the document. If so, we append "_1", "_2", etc.
                    // until we find an unused ID.

                    if (text.length === 0) {
                        text = "?";
                    }

                    var baseId = text.replace(/\s+/g, "_"), suffix = "", count = 1;

                    while (document.getElementById(baseId + suffix) !== null) {
                        suffix = "_" + count++;
                    }

                    return baseId + suffix;
                };

                return attr || generateUniqueId($(this).text());
            }).each(function () {
                // What level is the current heading?
                var elem = $(this), level = $.map(headingSelectors, function (selector, index) {
                    return elem.is(selector) ? index : undefined;
                })[0];

                if (level > currentLevel) {
                    // If the heading is at a deeper level than where we are, start a new nested
                    // list, but only if we already have some list items in the parent. If we do
                    // not, that means that we're skipping levels, so we can just add new list items
                    // at the current level.
                    // In the upside-down stack, unshift = push, and stack[0] = the top.
                    var parentItem = stack[0].children("li:last")[0];
                    if (parentItem) {
                        stack.unshift($("<" + listTag + "/>").appendTo(parentItem));
                    }
                } else {
                    // Truncate the stack to the current level by chopping off the 'top' of the
                    // stack. We also need to preserve at least one element in the stack - that is
                    // the containing element.
                    stack.splice(0, Math.min(currentLevel - level, Math.max(stack.length - 1, 0)));
                }

                // Add the list item
                $("<li/>").appendTo(stack[0]).append(
                    $("<a/>").text(elem.text()).attr("href", "#" + elem.attr("id"))
                );

                currentLevel = level;
            });
        });
    }, old = $.fn.toc;

    $.fn.toc = toc;

    $.fn.toc.noConflict = function () {
        $.fn.toc = old;
        return this;
    };

    // Data API
    $(function () {
        toc.call($("[data-toc]"));
    });
}(window.jQuery));
