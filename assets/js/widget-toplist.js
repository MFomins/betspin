import React from 'react';
import ReactDOM from 'react-dom';

const MyCustomImage = data => {
    return <div className="logo-main">
        <span className="id"></span>
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
        <div className="bonus-label">
        </div>
    </div>
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

//First toplist
window.herculesWidgetOverrides['customImage-live_casinos'] = MyCustomImage;
window.herculesWidgetOverrides['customInfo-live_casinos'] = MyCustomBonus;

window.herculesWidgetOverrides['additionalElement-live_casinos'] = additionalElement;

