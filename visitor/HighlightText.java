package visitor;

public class HighlightText implements Operation{
    @Override
    public void apply(Anchor anchor) {
        System.out.println("Anchor node is highlighted");
    }
}
