An AbstractLogger class that will take care of creating the logger and writing inside

A ChannelInterface class that defines the context

each channel will have a Logger class that will extend AbstractLogger and implements ChannelInterface

An Events class that will contain all events [I was inspired by FOSUser]
A GlobalChannelEvent class having a ChannelInterface constructor parameter and extending the Event class

When dispatching an event, a GlobalChannelEvent will be returned. In the listener, we call the method onEvent () of the channel contained in the GlobalChannelEvent
So, onEvent () will depend on the type of the channel, which we write the log in the right channel

Advantages:

Low coupling with business logic
More flexible for adaptation
No need to create EventListener or EventSuscriber for each Channel

disadvantages:

createLogger frozen in AbstractLogger. Which limits the possibility for other type of log [Email, Push, etc.]