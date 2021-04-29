<?php
namespace App;
class Role{
    const roles=[
        "Admin",
        "Manager",
        "Guest",
        "Floor Manager",
        "Front Desk",
        "Kitchen",
        "House Keeping"
    ];

    const hk_status=[
        "Clean",
        "Dirty",
        "Requested",
        "Scheduled",
        "Unknown"
    ];
}