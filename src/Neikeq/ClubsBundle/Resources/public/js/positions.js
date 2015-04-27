var positions = {
    10 : 'FW', 11 : 'ST', 12 : 'CF', 13 : 'WF',
    20 : 'MF', 21 : 'AMF', 22 : 'SMF', 23 : 'CMF', 24 : 'DMF',
    30 : 'DF', 31 : 'SB', 32 : 'CB', 33 : 'SW'
};

function position(code) {
    return positions[code];
}
