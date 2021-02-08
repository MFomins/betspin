import React from 'react';
import ReactDOM from 'react-dom';

const MyCustomImage = item => {
    return <div className="logo">
        <img src={item.image_url + item.logo_name} alt="logo" className="logo"></img>
        <div className="casino-name">
            {item.name}
        </div>
    </div>;
};

const MyCustomBonus = item => {
    return <div className="main-bonus">
        <div className="bonus-line">
            100% Match Bonus
        </div>
        <div className="bonus-label">
            Trusted
        </div>
    </div>
}

const additionalElement = data => {
    return <div className="total-games">
        <div className="total-slot-games">
            <span>452</span> slot games
        </div>
        <div className="total-live-games">
            <span>57</span> live games
        </div>
    </div>
};

//First toplist
window.herculesWidgetOverrides['customImage-live_casinos'] = MyCustomImage;
window.herculesWidgetOverrides['customInfo-live_casinos'] = MyCustomBonus;

window.herculesWidgetOverrides['additionalElement-live_casinos'] = additionalElement;

