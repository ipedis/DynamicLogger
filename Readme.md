Autre moyen:

Une classe AbstractLogger qui va se charger de créer le logger et d'écrire dédans

Une classe ChannelInterface qui sert à définir le contexte

chaque channel aura une classe Logger qui va étendre AbstractLogger et implémente ChannelInterface

Une classe Events qui va contenir tous les events [Je me suis inspiré de celle de FOSUser]
Une classe GlobalChannelEvent ayant comme paramètre en constructeur une ChannelInterface et étendre la classe Event

Lors du dispatch d'un event, un GlobalChannelEvent sera retourné. Dans le listener, on appel la method onEvent() de la channel contenu dans le GlobalChannelEvent
Du coup, onEvent() va dépendre du type de la channel, ce qui nous écrit le log dans le bon channel

Avantages:

Couplage faible avec la logique métier
Plus souple pour adaptation
Pas besoin de créer des EventListener ou EventSuscriber pour chaque Channel

Inconvénients:

createLogger figé dans AbstractLogger. Ce qui limite la possibilité pour d'autre type de log [Email, Push, etc]