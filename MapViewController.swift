//
//  MapViewController.swift
//  Travelert
//
//  Created by Ma !ta on 5/22/17.
//  Copyright © 2017 Ma !ta. All rights reserved.
//

import UIKit

class MapViewController: UIViewController {

    @IBAction func linkClicked(_ sender: Any) {
        openUrl(urlStr: "https://www.google.com")
    }
    
    func openUrl(urlStr:String!) {
        
        if let url = NSURL(string:urlStr) {
            UIApplication.shared.open(url as URL, options: [:], completionHandler: nil)
        }
        }
}
