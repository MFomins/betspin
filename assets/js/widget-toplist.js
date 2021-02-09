import React from 'react';
import ReactDOM from 'react-dom';

const pathname = "/wp-content/themes/betspintheme/dist/img/";

const MyCustomImage = data => {
    return <div className="logo-main">
        <span className="id" style={{ backgroundColor: data.extra_fields.ribbon_color }}></span>
        <img src={data.image_url + data.logo_name} alt="logo" className="logo"></img>
        <div className="casino-name">
            {data.name}
        </div>
    </div>;
};

const MyCustomBonus = data => {
    return <div className="main-bonus">
        <div className="bonus-line">
            {data.oneliner}
        </div>
        <div className="bonus-label" style={{ backgroundColor: data.extra_fields.ribbon_color }}>
            {data.extra_fields.ribbon}
        </div>
    </div>
}

const MyCustomPros = data => {
    return <ul className="selling_points">
        <li>{data.extra_fields.pro1}</li>
        <li>{data.extra_fields.pro2}</li>
        <li>{data.extra_fields.pro3}</li>
    </ul>
}

const additionalElement = data => {
    return <div className="total-games">
        <div className="total-slot-games">
            <span>{data.data.extra_fields.slot_games}</span> slot games
        </div>
        <div className="total-live-games">
            <span>{data.data.extra_fields.live_games}</span> live games
        </div>
    </div>
};

const MyCustomCTA = data => {
    return <div className="cta-btn">
        <a href={data.operatorLink} target="_blank" className="play_button">
            <div className="btn-left">
                <img src={pathname + "explore.png"} alt="explore" className="explore"></img>
            </div>
            <div className="btn-right">
                <i class="icon-right-open"></i>CLAIM BONUS
            </div>
        </a>
    </div>
};

const MyCustomReview = data => {
    return <div className="review align-center">
        <a href={data.review_link} className="review_button">{data.name} {data.review_text}</a>
    </div>;
};

const MyCustomTerms = data => {
    let isChecked = data.extraFields.terms_and_conditions_text_enabled;
    let terms = data.extraFields.terms_and_conditions;
    let tncChecked = data.extraFields.terms_and_conditions_link_enabled;
    let tnc = data.extraFields.terms_and_condition_link_text;
    return <div className="terms_conditions">
        <p>{isChecked === "1" ? terms : ''}<a href={data.tacLink}>{tncChecked === "1" ? tnc : ''}</a></p>
    </div>;
};


//First toplist
window.herculesWidgetOverrides['customImage-live_casinos'] = MyCustomImage;
window.herculesWidgetOverrides['customInfo-live_casinos'] = MyCustomBonus;
window.herculesWidgetOverrides['customSellingPoints-live_casinos'] = MyCustomPros;
window.herculesWidgetOverrides['additionalElement-live_casinos'] = additionalElement;
window.herculesWidgetOverrides['customCta-live_casinos'] = MyCustomCTA;
window.herculesWidgetOverrides['customReview-live_casinos'] = MyCustomReview;
window.herculesWidgetOverrides['customTermsAndConditions-live_casinos'] = MyCustomTerms;


