function show_automatic_widget(id, name)
{
    var show_section = "show_choose_" + name;
    if(id == "alert")
    {
        document.getElementById(show_section).innerHTML = '';
        document.getElementById(show_section).innerHTML += '<button class="btn btn-mini" id="alert" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Default</button><button class="btn btn-mini btn-danger" id="alert-error" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Error</button><button class="btn btn-mini btn-success" id="alert-success" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Success</button><button class="btn btn-mini btn-info" id="alert-info" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Info</button><button class="btn btn-mini btn-codstack" id="alert-codstack" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Codstack</button>';
    }
    if(id == "button")
    {
        document.getElementById(show_section).innerHTML = '';
        document.getElementById(show_section).innerHTML += '<button class="btn btn-mini" id="btn" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Default</button><button class="btn btn-mini btn-primary" id="btn-primary" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Primary</button><button class="btn btn-mini btn-info" id="btn-info" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Info</button><button class="btn btn-mini btn-success" id="btn-success" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Success</button><button class="btn btn-mini btn-warning" id="btn-warning" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Warning</button><button class="btn btn-mini btn-danger" id="btn-danger" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Danger</button><button class="btn btn-mini btn-inverse" id="btn-inverse" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Inverse</button><button class="btn btn-mini btn-info" id="btn-link" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Link</button><button class="btn btn-mini btn-codstack" id="btn-codstack" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Codstack</button><button class="btn btn-mini" id="btn-full" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Full Option</button>';
    }
    if(id == "button-group")
    {
        document.getElementById(show_section).innerHTML = '';
        document.getElementById(show_section).innerHTML += '<div class="btn-group"><button type="button" class="btn btn-mini btn-info disabled">Group</button><button class="btn btn-mini" id="btn-group" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Default</button><button class="btn btn-mini btn-primary" id="btn-group-primary" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Primary</button><button class="btn btn-mini btn-info" id="btn-group-info" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Info</button><button class="btn btn-mini btn-success" id="btn-group-success" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Success</button><button class="btn btn-mini btn-warning" id="btn-group-warning" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Warning</button><button class="btn btn-mini btn-danger" id="btn-group-danger" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Danger</button><button class="btn btn-mini btn-inverse" id="btn-group-inverse" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Inverse</button><button class="btn btn-mini btn-info" id="btn-group-link" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Link</button><button class="btn btn-mini btn-codstack" id="btn-group-codstack" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Codstack</button></div><br><br><div class="btn-group"><button type="button" class="btn btn-mini btn-info disabled">Vertical Group</button><button class="btn btn-mini" id="btn-group-vertical" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Default</button><button class="btn btn-mini btn-primary" id="btn-group-vertical-primary" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Primary</button><button class="btn btn-mini btn-info" id="btn-group-vertical-info" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Info</button><button class="btn btn-mini btn-success" id="btn-group-vertical-success" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Success</button><button class="btn btn-mini btn-warning" id="btn-group-vertical-warning" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Warning</button><button class="btn btn-mini btn-danger" id="btn-group-vertical-danger" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Danger</button><button class="btn btn-mini btn-inverse" id="btn-group-vertical-inverse" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Inverse</button><button class="btn btn-mini btn-info" id="btn-group-vertical-link" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Link</button><button class="btn btn-mini btn-codstack" id="btn-group-vertical-codstack" type="button" onclick="automatic_widget_add_shortcode(this.id, \''+name+'\');">Codstack</button></div></center>';
    }
}

function automatic_widget_add_shortcode(id, name)
{
    var show_section = "show_choose_" + name;
    switch(id)
    {
        case "alert":
            document.getElementById(name).value += "[bootstrap_alert class=\"\" style=\"\"] This is manually alert [/bootstrap_alert]";
        break;

        case "alert-error":
            document.getElementById(name).value += "[bootstrap_alert class=\"alert-error\" style=\"\"] This is manually error alert [/bootstrap_alert]";
        break;

        case "alert-success":
            document.getElementById(name).value += "[bootstrap_alert class=\"alert-success\" style=\"\"] This is manually success alert [/bootstrap_alert]";
        break;

        case "alert-info":
            document.getElementById(name).value += "[bootstrap_alert class=\"alert-info\" style=\"\"] This is manually info alert [/bootstrap_alert]";
        break;

        case "alert-codstack":
            document.getElementById(name).value += "[bootstrap_alert class=\"alert-codstack\" style=\"\"] This is manually codstack alert [/bootstrap_alert]";
        break;

        case "btn":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"\" style=\"\" disabled=\"false\"]Default[/bootstrap_button]";
        break;

        case "btn-primary":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-primary\" style=\"\" disabled=\"false\"]Primary[/bootstrap_button]";
        break;

        case "btn-info":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-info\" style=\"\" disabled=\"false\"]Info[/bootstrap_button]";
        break;

        case "btn-success":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-success\" style=\"\" disabled=\"false\"]Success[/bootstrap_button]";
        break;

        case "btn-warning":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-warning\" style=\"\" disabled=\"false\"]Warning[/bootstrap_button]";
        break;

        case "btn-danger":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-danger\" style=\"\" disabled=\"false\"]Danger[/bootstrap_button]";
        break;

        case "btn-inverse":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-inverse\" style=\"\" disabled=\"false\"]Inverse[/bootstrap_button]";
        break;

        case "btn-link":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-link\" style=\"\" disabled=\"false\"]Link[/bootstrap_button]";
        break;

        case "btn-codstack":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-codstack\" style=\"\" disabled=\"false\"]Codstack[/bootstrap_button]";
        break;

        case "btn-full":
            document.getElementById(name).value += "[bootstrap_button href=\"#\" type=\"\" class=\"btn-large btn-block\" style=\"\" disabled=\"false\"][bootstrap_icon class=\"icon-search\"]Full Option[/bootstrap_button]";
        break;

        case "btn-group":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-primary":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-primary\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-info":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-info\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-success":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-success\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-warning":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-warning\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-danger":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-danger\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-inverse":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-inverse\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-link":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-link\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-codstack":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"\" inner_class=\"btn btn-codstack\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-primary":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-primary\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-info":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-info\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-success":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-success\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-warning":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-warning\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-danger":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-danger\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-inverse":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-inverse\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-link":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-link\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "btn-group-vertical-codstack":
            document.getElementById(name).value += "[bootstrap_button_group href=\"#1, #2, #3\" class=\"btn-group-vertical\" inner_class=\"btn btn-codstack\" inner_value=\"btn1, btn2, btn3\" style=\"\"]";
        break;

        case "icon":
            document.getElementById(show_section).innerHTML = '';
            document.getElementById(name).value += "[bootstrap_icon class=\"Please write bootstrap icon class\" style=\"\"]";
        break;

        case "hero_unit":
            document.getElementById(show_section).innerHTML = '';
            document.getElementById(name).value += "[bootstrap_hero_unit heading=\"Head\" style=\"\"]Content[/bootstrap_hero_unit]";
        break;

        case "well":
            document.getElementById(show_section).innerHTML = '';
            document.getElementById(name).value += "[bootstrap_well class=\"\" style=\"\"]Content[/bootstrap_well]";
        break;

        case "link":
            document.getElementById(show_section).innerHTML = '';
            var link = prompt("Url","http://");
            var value1 = link;
            var text = prompt("Title","Link");
            var value2 = text;
            document.getElementById(name).value += "<a href=\""+value1+"\" >"+value2+"</a>";
        break;

        case "img":
            document.getElementById(show_section).innerHTML = '';
            var link = prompt("Enter the url of the image","http://");
            var value1 = link;
            var text = prompt("Enter a description of the image", "");
            var value2 = text;
            document.getElementById(name).value += "<img src=\""+value1+"\" alt=\""+value2+"\" />";
        break;

        default : alert("Invalid shortcode");
    }

}

function auto_widget_date_box(id, method, value)
{
    //id = "show_date_"+id; show_date_auto_
    var deadLineId = "show_date_"+id;
    var autoId = "show_date_auto_"+id;
    if(method == "hide")
    {
        document.getElementById(deadLineId).style.display = "none";
        document.getElementById(autoId).style.display = "none";
    }
    else
    {
        if(value == "auto")
        {
            document.getElementById(deadLineId).style.display = "none";
            document.getElementById(autoId).style.display = "";
        }
        else
        {
            document.getElementById(deadLineId).style.display = "";
            document.getElementById(autoId).style.display = "none";
        }
    }
}

function show_bootstrap_icons_auto_widget(method, id)
{
    id = "auto_widget_Bootstrap_icons_"+id;
    if(method == "show")
    {
        document.getElementById(id).style.display = "";
    }
    else
    {
        document.getElementById(id).style.display = "none";

    }
}