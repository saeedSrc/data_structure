package chain_of_responsibilities.java_chain;

public class Main {

    public static void main(String[] args) {
        // Create handlers
        Handler handlerA = new ConcreteHandlerA();
        Handler handlerB = new ConcreteHandlerB();

        // Set up the chain
        handlerA.setNextHandler(handlerB);

        // Create requests
        Request requestA = new Request("TypeA");
        Request requestB = new Request("TypeB");
        Request requestC = new Request("TypeC");

        // Process requests
        handlerA.handleRequest(requestA);

    }
}
