package com.company;

import java.util.Observable;
import java.util.Observer;

/**
 * Created by BELKHOUS on 08/02/2016.
 */
public class ObserverRelation implements Observer {
    @Override
    public void update(Observable o, Object arg) {
        if(menu.type=="relation"){
            System.out.println("UN NOUVEAU CHANGEMENT DANS RELATION");
            System.out.println("***********************************");
        }
    }
}

