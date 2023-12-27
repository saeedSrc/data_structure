package chain_of_responsibilities.java_chain;

public class ConcreteHandlerB implements Handler {
    private Handler nextHandler;

    @Override
    public void setNextHandler(Handler nextHandler)
    {
        this.nextHandler = nextHandler;
    }

    @Override
    public void handleRequest(Request request) {
        System.out.println("ConcreteHandlerB passes the request to the next handler");
        if (nextHandler != null) {
            nextHandler.handleRequest(request);
        }
    }
}
